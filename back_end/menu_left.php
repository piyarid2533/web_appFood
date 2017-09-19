<?php require_once '../font_end/Library/sql_login_admin.php';?>
<?php if ($_SESSION["psn_position"] == 1) { ?>
<div>
    <style type="text/css">
    ul.m_n_d {
        list-style-image: url(../ico/application.ico);
    }
     ul.v_d {
        list-style-image: url(../ico/view.ico);
    }
</style>
    <div class="panel">
        <div class="panel_header">
            จัดการข้อมูล
        </div>

        <div class="panel_body">
            <ul class="m_n_d">
                <li>
                    <a href="home.php?url=type_food">
                        จัดการประเภทเมนูอาหาร
                    </a>
                </li>
                <li>
                    <a href="home.php?url=food">
                        จัดการเมนูอารหารทั่วไป
                    </a>
                </li>
                <li>
                    <a href="home.php?url=Healthy_food">
                        จัดการเมนูอารหารเพื่อสุขภาพ
                    </a>
                </li>
                <li>
                    <a href="home.php?url=member">
                        จัดการข้อมูลสมาชิก
                    </a>
                </li>
                <li>
                    <a href="home.php?url=personnel_add">
                        จัดการข้อมูลพนักงาน
                    </a>
                </li>
                <li>
                    <a href="home.php?url=activity">
                        จัดการข้อมูลความต้องการ<br>พลังงานที่ใช้ในการทำกิจกรรม
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel_header">
        รายงาน
    </div>

    <div class="panel_body">
        <ul class="v_d">
            <li>
                <a href="home.php?url=show_food">
                    ดูข้อมูลเมนูอารหารและพลังงาน
                </a>
            </li>
            <li>
                <a href="home.php?url=order">
                    ตรวจสอบข้อมูลสถานะการจัดส่งอาหาร
                </a>
            </li>
            <li>
                <a href="home.php?url=view_order">
                    ดูข้อมูลการสั่งซื้อ
                </a>
            </li>
            <li>
                <a href="home.php?url=report_order_max">
                    ดูรายงานอันดับอารหารที่ขายดี
                </a>
            </li>
            <li>
                <a href="home.php?url=report_order_min">
                    ดูรายงานอันดับอารหารที่ขายไม่ดี
                </a>
            </li>
             <li>
                <a href="home.php?url=report_order_sales">
                    สรุปยอดขาย
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="panel">
    <div class="panel_header">
        ข้อมูล Admin
    </div>
    <div class="panel_body">
        <div style="margin-left: 20px;">
            ยินดีต้อนรับ <br />
                  คุณ :<?php echo $_SESSION["psn_name"]; ?><br />
                  สถานะ : <?php
                  if ($_SESSION["psn_position"] == 1) {
                      echo "<font color='red'>เจ้าของร้าน</font>";
                  } else {
                      echo "พนักงาน";
                  }
                  ?>
        </div>
        <p style="margin-left: 10px;">
            <a href="home.php?url=show_dataadmin&psn_id=<?=$r[psn_id]?>">
                <font color="#FF1493">
                <img src="../ico/male.ico"/>แก้ข้อมูลผู้ดูและระบบ
                </font>
            </a><br>
        <a href="logout.php"onclick="return confirm('แน่ใจว่าคุณต้องการออกจากระบบ');">
            <img src="../ico/turn off.ico" width="20px" height="15px"/>
            ออกจากระบบ
        </a>
        </p>
    </div>
</div>
<?php } // end if ?>


<?php require_once '../font_end/Library/sql_login_personnel.php';?>
<?php if ($_SESSION["psn_position"] == 0) { ?>
    <div>
    <style type="text/css">
     ul.m_emp {
        list-style-image: url(../ico/paste.ico);
    }
</style>
    <div class="panel">
        <div class="panel_header">
            จัดการข้อมูลสำหรับพนักงาน
        </div>

        <div class="panel_body">
            <ul class="m_emp">
                <li>
                    <a href="home.php?url=order">
                        ดู Order
                    </a>
                </li>
                <li>
                    <a href="home.php?url=view_order">
                        ปริ้นใบเสร็จค่าอาหาร/Kcal
                    </a>
                </li>
                <li>
                    <a href="home.php?url=show_dataadmin&psn_id=<?=$r[psn_id]?>">
                        แก้ไขข้อมูลส่วนตัว
                    </a>
                </li>
            </ul>
            <div style="margin-left: 20px;">
                    ยินดีต้อนรับ <br />
                    คุณ :<?php echo $_SESSION["psn_name"]; ?><br />
                    สถานะ : <?php
                    if ($_SESSION["psn_position"] == 1) {
                        echo "<font color='red'>เจ้าของร้าน</font>";
                    } else {
                        echo "<font color='red'>พนักงาน</font>";
                    }
                    ?>
                    <br/><br/>
                    <a href="logout.php"onclick="return confirm('แน่ใจว่าคุณต้องการออกจากระบบ');">
                        <img src="../ico/close.ico" width="20px" height="15px"/>
                        ออกจากระบบ
                    </a>
                </div>
            
        </div>

    </div>
</div>
<br/>
<?php } ?>


