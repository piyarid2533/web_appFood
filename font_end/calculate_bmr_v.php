<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header style="margin-left: 20px;margin-top: 10px;
        background:lightseagreen;padding: 10px;color: #fff;">
            <strong>คำนวณค่า BMR ของเพศหญิง</strong>
        </header>
        <p style="margin: 20px;">
            การคำนวณค่าการเผาผลาญพลังงาน ที่ร่างกายต้องการต่อวัน Basal Metabolic Rate (BMR)
            หรือพลังงานต่ำสุดที่ร่างกายต้องการต่อวันในเพศชาย โดยวัดจากน้ำหนักตัว ส่วนสูง และอายุเป็นการคำนวณพื้นฐานในช่วงเวลาปกติ เป้าหมายเพื่อใช้วัดพลังงานที่ร่างกายเผาผลาญได้ต่อวัน
            เพื่อกำหนดการกินอาหารให้ถูกหลักจากโภชนาการแบบนับแคลอรี่โดยเพศชายจะมีค่าความต้องการพลังงานมากกว่าเพศหญิง
         
            <a href="index.php?url=calculate_bmr_m">
                <strong>คำนวณค่า BMR ของเพศชาย</strong>
            </a>
            
        </p>
        
        <div style="margin-top: 30px;">
            <fieldset style="border: 1px #cccccc solid;margin: 10px;">
                <legend>
                    <img src="../ico/female.ico">
                    คำนวณค่า BMR ของเพศหญิง
                </legend>
            <form action="index.php?url=calculate_bmr_v" method="post">
                <table align="center" width="90%">
                <tr>
                    <td align="right">น้ำหนักตัว :</td>
                    <td><input type="text" name="w1"/></td>
                </tr>
                <tr>
                    <td align="right">ส่วนสูง :</td>
                    <td><input type="text" name="h1"/></td>
                </tr>
                <tr>
                    <td align="right">อายุ :</td>
                    <td><input type="text" name="a1"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="คำนวณKcal/วัน"/>
                        <input type="reset" value="ยกเลิก"/>
                    </td>
                </tr>
                </table>
                
                
                <?php
            
                //var
                $w1 = $_POST["w1"];
                $h1 = $_POST["h1"];
                $a1 = $_POST["a1"];
                
                    if(empty($w1)|| empty($h1) || empty($a1)){
                        exit();
                    } else {
                        
                        //Action calculate
                        
                        $w = 665;$s = 9.6; 
                        $sum_w = $w + $w1 * $s; 
                        /*------ค่าน้ำหนัก------*/

                        $h = 1.8;
                        $sum_h = $h * $h1;
                         /*------ส่วนสูง------*/

                        $a = 4.7;
                        $sum_a = $a * $a1;
                         /*------อายุ------*/
                        
                        //process
                        $out_put = ($sum_w+$sum_h)-$sum_a;
                }
            
            ?>
                <div style="margin-left: 40px;margin-top: 30px;">
                    <span>
                        <?php 
                        echo ""
                        . "<strong>ค่าที่ได้ = </strong>" . $out_put ."(Kcal)"
                        . "";
                        ?>
                    </span>
                </div>
                <div style="text-align: center;margin-top: 30px;color: darkorange">
                    <p>
                        ค่า BMR จะมีการเปลี่ยนแปลงตามกิจกรรมที่ทำในแต่ละวัน ดังนั้นจึงได้เป็นเพียงค่าประมาณ
                        ซึ่งโดยเฉลี่ยแล้วคนเราจะ<br/>ต้องการพลังงานประมาณวันละ 2,000 กิโลแคลอรี่
                        เพื่อให้ร่างกายทำงานได้อย่างมีประสิทธิภาพ
                    </p>
                </div>
            </form>
           </fieldset>
        </div>
    </body>
</html>
