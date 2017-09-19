<?php
    require_once '../config/connect.php';
?>
<fieldset style="border: 1px #cccccc solid;margin: 10px;">
  <legend>
      <a href="home.php?url=Healthy_food">
          <img src="../ico/playback.ico"/>
          <label>back</label>
      </a>
  </legend>
    <div align="center" style="margin-top:5px;margin-buttom:5px;">
        <form method="post" action="food_add.php" enctype="multipart/form-data" name="formfood" onsubmit="return Formfood()">
        <table style="border: 1px #66CDAA solid;" cellpadding="5px"width="70%">
          <tr>
            <th colspan="2" bgcolor="lightseagreen" style="padding:5px;color: #fff;">
                จัดการเมนูอาหารจากผลิตภัณฑ์ไข่ขาว 
            </th>
          </tr>
          <tr>
            <td width="150px" align="right">ชื่ออาหาร :</td>
            <td><input type="text" name="food_name"></td>
          </tr>
          <tr>
              <td align="right">ประเภทอาหารเมนูอาหาร :</td>
            <td>
              <!-- foodtype_id -->
              <select name="foodtype_id" id="foodtype_id">
                   <option value="00">Select Food Type</option>
                   <?php 
                        $sql = "SELECT * FROM foodtype";
                        
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result)) {
                                echo ""
                                . ""
                                . "<option value='" . $data['foodtype_id']."'>" 
                                . $data['foodtype_name'] . "</option>";
                            }
                   ?>
              </select>
            </td>
          </tr>
          <tr>
              <td align="right">พลังงาน :</td>
              <td><input type="text" name="food_energy"></td>
          </tr>
          <tr>
            <td align="right">ราคา :</td>
            <td><input type="text" name="food_price"></td>
          </tr>
          <tr>
            <td valign="top" align="right">วิธีทำ :</td>
            <td>
                <textarea rows="4" cols="30" name="food_howdo"></textarea>
            </td>
          </tr>
          <tr>
            <td align="right">รูปภาพ :</td>
            <td><input type="file" name="food_img"></td>
          </tr>
          <tr>
            <td valign="top" align="right">ส่วนผสม :</td>
            <td>
                <textarea rows="4" cols="30" name="food_rawmaterial"></textarea>
            </td>
          </tr>
          <tr>
            <td valign="top" align="right">ลายละเอียด :</td>
            <td>
                <textarea rows="4" cols="30" name="food_detail"></textarea>
            </td>
          </tr>
          <tr align="center">
            <td colspan="2">
              <input type="submit" value="Send"/>
              <input type="reset" value="Reset"/>
            </td>
          </tr>
        </table>
      </form>
    </div>
</fieldset>
