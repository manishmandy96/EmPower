<?php
include 'config.php';
session_start();
if(!isset($_SESSION['user']))
{
header('Location:index.php');
}
include 'header.php';
$id = $_SESSION['user'];
$query="select * from user_record where user_id='$id'";
$result=mysqli_query($con,$query);
$row   =mysqli_fetch_assoc($result);
// echo '<pre>',var_dump($row['user_id']); echo '</pre>';
$userid = $row['id'];

$querys="select * from shifttime where user_id=$userid";
$results=mysqli_query($con,$querys);
$rows   =mysqli_fetch_assoc($results);
$num          =  mysqli_num_rows($results);

?>

  <section class="timer-section">
    <div class="container">
      <h2>Let's make the goal today!</h2>
      <div class="wrap-timer">
        <h2 class="userid">User Id: <?php echo $row['user_id'];?></h2>
      </div>
      <div class="wrap-date">
           <h3><?php echo date('D');?>, <?php echo date('M d');?>  </h3>
           <h3><span>10:00 - 18:00</span></h3>
      </div>
      <div class="address">
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> Abc Adrress line 1, address line 2 ON Pincode</p> 
      </div>
      <div>
      <p id = "output" class = "text-center"></p>
      <div id = "controls" class = "text-center">
        <form>
          <input id="user_id" type="hidden" name="user_id" value="<?php echo $_SESSION['user'];?>">
           <h1  id="work_time">00:00:00</h1>
            <ul class="timerstart">
              <li id="start" class="start"> Start</li>
              <li id="stop" class="break">Break</li>
              <li id="clear" class="continue">Check Out</li>
           </ul>
           <textarea class="formcontrol notes" name="notes"  placeholder="Add Notes"></textarea>
        </form>
      </div>
      
      
    </div>

  </section>

<?php
if($num > 0):
?>
<section class="shifttime">
  <div class="container">
      <h6>Shift Time</h6>
      <div class="wrap-shift">
        <div>
<?php
$shiftdate =  $rows['shiftdate'];

$date=date_create($shiftdate);
echo date_format($date,"d, M Y");
?>
        

      </div>
        <div class="timebet"><?php echo $rows['time_from'];?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo $rows['time_to'];?>  </div>
      </div>
  </div>
</section>
<?php
endif;
?>
  <section class="custom_table" style="display: none;">
    
    <table border="1">
      <thead>
          <tr>
              <th><span>0.00   <br> SPH</span></th>
              <th><span>0.00   <br> APH</span></th>
              <th><span>$14.00 <br> /Hour</span></th>
          </tr>

      </thead>
      <tbody>
            <tr>
              <td><span>0.00   <br> Approach</span></td>
              <td><span>0 <br> MX</span></td>
              <td><span>0 <br> MZ</span></td>
            </tr>
            <tr>
              <td><span>0.00   <br> Approach</span></td>
              <td><span>0 <br> MX</span></td>
              <td><span>0 <br> MZ</span></td>
            </tr>
             <tr>
              <td><span>0.00   <br> Approach</span></td>
              <td><span>0 <br> MX</span></td>
              <td><span>0 <br> MZ</span></td>
            </tr>
            <tr>
              <td><span>0.00   <br> Approach</span></td>
              <td><span>0 <br> MX</span></td>
              <td><span>0 <br> MZ</span></td>
            </tr>
      </tbody>
    </table>
  </section>
  <br><br><br>
<section>
<div class="container">
  <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3"></div>
      <div class="col-xl-6 col-lg-6 col-md-6">
       <table class="table text-center">
         
          <tbody>
          <tr class="approach"> 
          <td></td>
          <td>Approach</td>
          <td></td>
          </tr> 
          <tr>
              <td><div  class="minus-icon" onclick="subsNum('num1')"><i class="fa fa-minus" aria-hidden="true"></i></div></td>
              <td><div class="num-div"><span id="num1">0</span></div></td>
              <td><div class="plus-icon" onclick="addNum('num1')"><i class="fa fa-plus" aria-hidden="true"></i></div></td>
          </tr>
          <tr>
              <td><div class="minus-icon" onclick="subsNum('num2')"><i class="fa fa-minus" aria-hidden="true"></i></div></td>
              <td><div class="num-div"><span id="num2">0</span></div></td>
              <td><div class="plus-icon" onclick="addNum('num2')"><i class="fa fa-plus" aria-hidden="true"></i></div></td>
          </tr>
          <tr>
            <td><div class="minus-icon" onclick="subsNum('num3')"><i class="fa fa-minus" aria-hidden="true"></i></div></td>
            <td><div class="num-div"><span id="num3">0</span></div></td>
            <td><div class="plus-icon" onclick="addNum('num3')"><i class="fa fa-plus" aria-hidden="true"></i></div></td>
          </tr>
          <tr>
            <td><div class="minus-icon" onclick="subsNum('num4')"><i class="fa fa-minus" aria-hidden="true"></i></div></td>
            <td><div class="num-div"><span id="num4">0</span></div></td>
            <td><div class="plus-icon" onclick="addNum('num4')"><i class="fa fa-plus" aria-hidden="true"></i></div></td>
          </tr>
          <tr>
            <td><div class="minus-icon" onclick="subsNum('num5')"><i class="fa fa-minus" aria-hidden="true"></i></div></td>
            <td><div class="num-div"><span id="num5">0</span></div></td>
            <td><div class="plus-icon" onclick="addNum('num5')"><i class="fa fa-plus" aria-hidden="true"></i></div></td>
          </tr>
          <tr>
         
          </tbody>
        </table>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3"></div>
    </div>
</div>  

</section>


</body>
<script type="text/javascript">
var h1 = document.getElementsByTagName('h1')[0],
    start = document.getElementById('start'),
    stop = document.getElementById('stop'),
    clear = document.getElementById('clear'),
    seconds = 0, minutes = 0, hours = 0,
    flag=0,
    t = 0;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
    $(".custom_table").show();
    timer();
}
function timer() {
    if(flag==1)
    {
     h1.textContent = "00:00:00";
    seconds = 0; minutes = 0; hours = 0;
      flag=0; 
    }
    t = setTimeout(add, 1000);
    $('#start').addClass('disable');
}

/* Start button */

 start.onclick = timer;
/* Stop button */
stop.onclick = function() {
  clearTimeout(t);
  $('#start').removeClass('disable');

}
 clear.onclick=function(){
   clearTimeout(t);
   flag=1;
   $('#start').removeClass('disable');

 }

  function addNum(x){
    var num=document.getElementById(x).innerHTML;
    num++;
    document.getElementById(x).innerHTML=num;
  }
  function subsNum(x){
    var num=document.getElementById(x).innerHTML;
    if(num>0)
    {
      num--;
      document.getElementById(x).innerHTML=num;
    }
  }
  $(document).ready(function(){
      $('#clear').click(function(){
         var userid =  $('#user_id').val();
         var time   =  $("#work_time").text();
         var notes   =  $(".notes").val();
 
         $.ajax({
            type : 'POST',
            url  : 'checkout.php',
            data : {'userid':userid,'worktime':time,'notes':notes},
            success: function(result)
            {
             alert("Have a Nice Day!!"); 
            }
         });
         
      }); 
  });         
</script>
</html>
