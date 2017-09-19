<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../config/connect.php';

        $food_id = $_GET['food_id'];

        $sql = "SELECT  * FROM food where food_id='$food_id'";

        $result = mysql_query($sql);

        $data = mysql_fetch_array($result);
        ?>
        <fieldset style="border: 1px #cccccc solid;margin: 10px;">
            <legend>
                แก้ไขเมนูอารหารพร้อมพลังงาน
            </legend>
            <div align="center" style="margin-top:5px;margin-buttom:5px;">
                <form method="post" action="update_food_process.php" enctype="multipart/form-data">
                    <table border="1px" width="70%" style="border-collapse:collapse;border: 1px #999 solid;">
                        <tr>
                            <th colspan="2" bgcolor="#AFEEEE" style="padding:5px;">
                                แก้ไขเมนูอารหารพร้อมพลังงาน
                            </th>
                        </tr>
                        <tr>
                            <td width="150px" align="right">ชื่ออาหาร :</td>
                            <td><input type="text" name="food_name" value="<?= $data['food_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td align="right">ประเภทอาหารเมนูอาหาร :</td>
                            <td>
                                <!-- foodtype_id -->
                                <select name="foodtype_id" id="foodtype_id">
                                    <option value="00">Select Food Type</option>
                                    <?php
                                    $sql = "select * from foodtype";
                                    $result = mysql_query($sql);
                                    while ($data2 = mysql_fetch_array($result)) {
                                        if ($data['foodtype_id'] == $data2['foodtype_id']) {
                                            echo ""
                                            . "<option value='" . $data2['foodtype_id'] . 
                                              "' selected=selected'>" . $data2['foodtype_name'] . "</option>";
                                        } else {
                                            echo ""
                                            . "<option value='" . $data2['foodtype_id'] . "'>" .
                                              $data2['foodtype_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">พลังงาน :</td>
                            <td><input type="text" name="food_energy" value="<?=$data['food_energy']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">ราคา :</td>
                            <td><input type="text" name="food_price" value="<?=$data['food_price']?>"></td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">วิธีทำ :</td>
                            <td>
                            <textarea rows="4" cols="30" name="food_howdo">
                                <?php echo $data["food_howdo"];?>
                            </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">รูปภาพ :</td>
                            <td>
                                <input type="file" name="food_img">
                                <img 
                                    width="300px" hight="300px" 
                                    src="<?php echo "../fileupload/" . $data[food_img];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">ส่วนผสม :</td>
                            <td>
                                <textarea rows="4" cols="30" name="food_rawmaterial">
                                    <?php echo $data['food_rawmaterial'];?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">ลายละเอียด :</td>
                            <td>
                                <textarea rows="4" cols="30" name="food_detail">
                                    <?php echo $data[food_detail]?>
                                </textarea>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">
                                <input type="submit" value="Send"/>
                                <input type="reset" value="Reset"/>
                                <input type="hidden" name="food_id" value="<?= $data['food_id'] ?>"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </fieldset>

    </body>
</html>
