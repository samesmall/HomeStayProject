<?php

require('../inc/db_config.php');
require('../inc/essentials.php');

adminLogin();
    

if(isset($_POST['get_bookings']))
{
    $frm_data = filteration($_POST);

    $limit = 1;
    $page = $frm_data['page'];
    $start = ($page-1)*$limit;

   $query = "SELECT distinct bo.* ,bd.* FROM `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
   WHERE ( (bo.booking_status='pending' AND bo.arrival=1) OR (bo.booking_status='cancelled' AND bo.refund=1) OR (bo.booking_status='payment failed'))
   AND (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?)
   ORDER BY bo.booking_id DESC";

   $res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%"],'sss');
   $limit_query = $query."LIMIT $start,$limit";
   $limit_res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%"],'sss');

   $i=1;
   $table_data = "";

   $total_rows = mysqli_num_rows($res);
   if($total_rows==0){
    $output = json_encode(['table_data'=>"<b>No Data Found!</b>","pagination"=>'']);
    echo $output;
    exit();
   }
   $i=$start+1;
   $table_data = "";
   while ($data = mysqli_fetch_assoc($limit_res))
   {
    $date = date("d-m-Y",strtotime($data['datentime']));
    $checkin = date("d-m-Y",strtotime($data['check_in']));
    $checkout = date("d-m-Y",strtotime($data['check_out']));

    if($data['booking_status']=='booked'){
        $status_bg = 'bg-success';
    }
    else if($data['booking_status']=='cancelled'){
        $status_bg = 'bg-danger';
    }else{
        $status_bg = 'bg-warning text-dark';
    }
    $table_data .="
    <tr>
        <td style='padding-left: 20px'>$i</td>
        <td>
            <span class='badge bg-primary'>
               $data[order_id]
            </span>
        </td>
        <td>$data[user_name]</td>
        <td>$data[phonenum]</td>
        <td>
            $data[room_name]
        </td>
        <td>
            $data[total_pay] vnd
        </td>
        <td>
          $date
        </td>
        <td>
        <span class='badge $status_bg'>$data[booking_status]</span>
        </td>
        <td>
            <button type='button' onclick='download($data[booking_id])' class='mt-2 btn btn-outline-danger btn-sm fw-bold shadow-none'>
            <i class='bi bi-filetype-pdf'></i>
            </button>
        </td>
    </tr>
    ";
    $i++;
   }

   $pagination = "";
   if($total_rows>$limit){
      $total_pages = ceil($total_rows/$limit);

      
      if($page!=1){
        $pagination .="<li class='page-item'>
        <button onclick='change_page(1)' class='page-link shadow-none'>First</button>
        </li>";
      }

      $disabled =($page==1) ? "disabled" : "";
      $prev = $page-1;
      $pagination .="<li class='page-item $disabled'>
      <button onclick='change_page($prev)' class='page-link shadow-none'>Prev</button>
      </li>";

      $disabled =($page==$total_pages) ? "disabled" : "";
      $next = $page+1;
      $pagination .="<li class='page-item $disabled'>
      <button onclick='change_page($next)' class='page-link shadow-none'>Next</button>
      </li>";

      if($page!=$total_pages){
        $pagination .="<li class='page-item'>
        <button onclick='change_page($total_pages)' class='page-link shadow-none'>Last</button>
        </li>";
      }
   }

   $output = json_encode(["table_data"=>$table_data,"pagination"=>$pagination]);
   echo $output;
}


if(isset($_POST['assign_room']))
{
    $frm_data = filteration($_POST);

    $query = "UPDATE `booking_order` bo INNER JOIN `booking_details` bd 
    ON bo.booking_id = bd.booking_id
    SET bo.arrival = ?, bd.room_no = ?
    WHERE bo.booking_id = ?";

    $values = [1,$frm_data['room_no'],$frm_data['booking_id']];
    $res = update($query,$values,'isi');//it will update 2 rows so it will return 2

    echo ($res==2) ? 1 : 0;

}


if(isset($_POST['cancel_booking']))
{
    $frm_data = filteration($_POST);
    
   $query = "UPDATE `booking_order` SET `booking_status`=?, `refund`=? WHERE `booking_id`=?";
   $values = ['cancelled',0,$frm_data['booking_id']];
   $res = update($query,$values,'sii');

   echo $res;
}

if(isset($_POST['search_user']))
{
  $frm_data = filteration($_POST);
  $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";
  $res = select($query,["%$frm_data[name]%"],'s');
  $i= 1;

  $data = "";
  while($row = mysqli_fetch_assoc($res))
  {
    $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
    <i class='bi bi-trash'></i>
    </button>";
    $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

    if($row['is_verified']){
        $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
        $del_btn ="";
    }

    $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-sm btn-success text-white shadow-none'>active</button>";

    if(!$row['status']){
        $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-sm btn-danger text-white shadow-none'>inactive</button>";
    }
    $date = date("d-m-Y : H:m:s",strtotime($row['datentime']));
    $data.="
    <tr>
        <td>$i</td>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phonenum]</td>
        <td>$verified</td>
        <td>$status</td>
        <td>$date</td>
        <td>$del_btn</td>
    </tr>
    ";
    $i++;
  }
  echo $data;
}
?>

