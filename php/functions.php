<?php

function transac($db){
    $query1 = "select * from `transactionhistory`";
	$fetch1 = mysqli_query($db,$query1);
    $row = mysqli_num_rows($fetch1);
    
    if($row > 0){
        while($fetchdata1 = mysqli_fetch_array($fetch1)){
            $historyid = $fetchdata1['id'];
            $date = $fetchdata1['date'];
            $amount = $fetchdata1['amount'];
            $type = $fetchdata1['type'];
            $details = $fetchdata1['details'];
            $accnumber = $fetchdata1['accountnumber'];

            echo "
            <tr>
                          
            <td>
              <span>$historyid</span>
            </td>
            <td class='nowrap'>
              <span class='status-pill smaller green'></span><span>$accnumber</span>
            </td>
            <td>
              <span>$date</span><span class='smaller lighter'></span>
            </td>
            <td class='cell-with-media'>
              <img alt=''  style='height: 25px;'><span>$details</span>
            </td>
            <td class='text-center'>
              <a class='badge badge-primary' href=''>$type</a>
            </td>
            <td class='text-right bolder nowrap'>
              <span class='text-success'>$amount</span>
            </td>
          </tr>
            ";
        }
    }
}



function showimg($uid,$db){
        $result = $db->query("SELECT * FROM register where userid = '$uid'");
        $user = $result->fetch_assoc();


                        if($user){
                            $mimage = $user['picture'];
                            $img = "<img alt='' src='img/$mimage'>";
                            echo $img;
                        }    

}

?>