<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '验配登记';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

.table11_3 table {
	width:100%;
	margin:15px 0;
	border:0;
}
.table11_3 th {
	background-color:#E2E2E2;
	color:#000000
}
.table11_3,.table11_3 th,.table11_3 td {
	font-size:0.95em;
	text-align:center;
	padding:4px;
	border-collapse:collapse;
}
.table11_3 th,.table11_3 td {
	border: 1px solid ;
	border-width:1px 0 1px 0;
	border:2px inset #ffffff;
}
.table11_3 tr {
	border: 1px solid #ffffff;
}
.STYLE1 {color: #FF0000}
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
             <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
                    ],
                ]); ?>
    <table  class=table11_3>
      <tr>
            <th>
              <label>选择会员</label>
            </th>
            <th>
              <label>单据日期</label>
            </th>
            <th>
              <label>单据编号</label>
            </th>
            <th>
              <label>销售人员</label>
            </th>
        </tr>
        <tr>
            <td width="25%">
              <?= $form->field($model, 'name')->widget(\kartik\select2\Select2::className(), 
					['data' => ArrayHelper::map(\common\models\member\Member::find()->asArray()->all(), 'id', 'username'),
					])->label('')  ?>
            </td>
        	<td width="25%">
          	</td>
          	<td width="25%">
          	</td>
          	<td width="25%">
          	</td>
      </tr>
    </table>
    <div >
      <div align="center"  style="font-size:16px; font-weight:bold;">
        <p>验光信息</p>
      </div>
      <div class="list-div">
        <table  class=table11_3 >
          <tr height="40px">
            <th width="2%" scope="col">&nbsp;</th>
            <th width="7.1%" scope="col">球镜</th>
            <th width="7.1%" scope="col">柱镜</th>
            <th width="7.1%" scope="col">光轴</th>
            <th width="7.1%" scope="col">瞳距</th>
            <th width="7.1%" scope="col">棱镜</th>
            <th width="7.1%" scope="col">基底</th>
            <th width="7.1%" scope="col">矫正视力</th>
            <th width="7.1%" scope="col">裸眼视力</th>
            <th width="7.1%" scope="col">ADD</th>
            <th width="7.1%" scope="col">瞳高</th>
            <th width="7.1%" scope="col">基弧</th>
            <th width="7.1%" scope="col">PD</th>
            <th width="" scope="col">类型</th>
          </tr>
          <tr height="40px">
            <td>R</td>
            <td><input name="rightsph" type="text"id="rightsph"size="8"list="ide1"/>
              <datalist id="ide1">
                <option value="800"/>
                <option value="775"/>
                <option value="750"/>
                <option value="725"/>
                <option value="700"/>
                <option value="675"/>
                <option value="650"/>
                <option value="625"/>
                <option value="600"/>
                <option value="575"/>
                <option value="550"/>
                <option value="525"/>
                <option value="500"/>
                <option value="475"/>
                <option value="450"/>
                <option value="425"/>
                <option value="400"/>
                <option value="375"/>
                <option value="350"/>
                <option value="325"/>
                <option value="300"/>
                <option value="275"/>
                <option value="250"/>
                <option value="225"/>
                <option value="200"/>
                <option value="175"/>
                <option value="150"/>
                <option value="125"/>
                <option value="100"/>
                <option value="75"/>
                <option value="50"/>
                <option value="25"/>
                <option value="0"/>
                <option value="-25"/>
                <option value="-50"/>
                <option value="-75"/>
                <option value="-100"/>
                <option value="-125"/>
                <option value="-150"/>
                <option value="-175"/>
                <option value="-200"/>
                <option value="-225"/>
                <option value="-250"/>
                <option value="-275"/>
                <option value="-300"/>
                <option value="-325"/>
                <option value="-350"/>
                <option value="-375"/>
                <option value="-400"/>
                <option value="-425"/>
                <option value="-450"/>
                <option value="-475"/>
                <option value="-500"/>
                <option value="-525"/>
                <option value="-550"/>
                <option value="-575"/>
                <option value="-600"/>
                <option value="-625"/>
                <option value="-650"/>
                <option value="-675"/>
                <option value="-700"/>
                <option value="-725"/>
                <option value="-750"/>
                <option value="-775"/>
                <option value="-800"/>
                <option value="-825"/>
                <option value="-850"/>
                <option value="-875"/>
                <option value="-900"/>
                <option value="-925"/>
                <option value="-950"/>
                <option value="-975"/>
                <option value="-1000"/>
              </datalist></td>
            <td><input name="rightcyl" type="text"id="rightcyl"size="8"list="ide2"/>
              <datalist id="ide2">
                <option value="200"/>
                <option value="175"/>
                <option value="150"/>
                <option value="125"/>
                <option value="100"/>
                <option value="75"/>
                <option value="50"/>
                <option value="25"/>
                <option value="0"/>
                <option value="-25"/>
                <option value="-50"/>
                <option value="-75"/>
                <option value="-100"/>
                <option value="-125"/>
                <option value="-150"/>
                <option value="-175"/>
                <option value="-200"/>
              </datalist>
            </td>
            <td><label>
              <input name="rightax" type="text"id="rightax"size="8"list="ide3"/>
              <datalist id="ide3">
                <option value="1"/>
                <option value="2"/>
                <option value="3"/>
                <option value="4"/>
                <option value="5"/>
                <option value="6"/>
                <option value="7"/>
                <option value="8"/>
                <option value="9"/>
                <option value="10"/>
                <option value="11"/>
                <option value="12"/>
                <option value="13"/>
                <option value="14"/>
                <option value="15"/>
                <option value="16"/>
                <option value="17"/>
                <option value="18"/>
                <option value="19"/>
                <option value="20"/>
                <option value="21"/>
                <option value="22"/>
                <option value="23"/>
                <option value="24"/>
                <option value="25"/>
                <option value="26"/>
                <option value="27"/>
                <option value="28"/>
                <option value="29"/>
                <option value="30"/>
                <option value="31"/>
                <option value="32"/>
                <option value="33"/>
                <option value="34"/>
                <option value="35"/>
                <option value="36"/>
                <option value="37"/>
                <option value="38"/>
                <option value="39"/>
                <option value="40"/>
                <option value="41"/>
                <option value="42"/>
                <option value="43"/>
                <option value="44"/>
                <option value="45"/>
                <option value="46"/>
                <option value="47"/>
                <option value="48"/>
                <option value="49"/>
                <option value="50"/>
                <option value="51"/>
                <option value="52"/>
                <option value="53"/>
                <option value="54"/>
                <option value="55"/>
                <option value="56"/>
                <option value="57"/>
                <option value="58"/>
                <option value="59"/>
                <option value="60"/>
                <option value="61"/>
                <option value="62"/>
                <option value="63"/>
                <option value="64"/>
                <option value="65"/>
                <option value="66"/>
                <option value="67"/>
                <option value="68"/>
                <option value="69"/>
                <option value="70"/>
                <option value="71"/>
                <option value="72"/>
                <option value="73"/>
                <option value="74"/>
                <option value="75"/>
                <option value="76"/>
                <option value="77"/>
                <option value="78"/>
                <option value="79"/>
                <option value="80"/>
                <option value="81"/>
                <option value="82"/>
                <option value="83"/>
                <option value="84"/>
                <option value="85"/>
                <option value="86"/>
                <option value="87"/>
                <option value="88"/>
                <option value="89"/>
                <option value="90"/>
                <option value="91"/>
                <option value="92"/>
                <option value="93"/>
                <option value="94"/>
                <option value="95"/>
                <option value="96"/>
                <option value="97"/>
                <option value="98"/>
                <option value="99"/>
                <option value="100"/>
                <option value="101"/>
                <option value="102"/>
                <option value="103"/>
                <option value="104"/>
                <option value="105"/>
                <option value="106"/>
                <option value="107"/>
                <option value="108"/>
                <option value="109"/>
                <option value="110"/>
                <option value="111"/>
                <option value="112"/>
                <option value="113"/>
                <option value="114"/>
                <option value="115"/>
                <option value="116"/>
                <option value="117"/>
                <option value="118"/>
                <option value="119"/>
                <option value="120"/>
                <option value="121"/>
                <option value="122"/>
                <option value="123"/>
                <option value="124"/>
                <option value="125"/>
                <option value="126"/>
                <option value="127"/>
                <option value="128"/>
                <option value="129"/>
                <option value="130"/>
                <option value="131"/>
                <option value="132"/>
                <option value="133"/>
                <option value="134"/>
                <option value="135"/>
                <option value="136"/>
                <option value="137"/>
                <option value="138"/>
                <option value="139"/>
                <option value="140"/>
                <option value="141"/>
                <option value="142"/>
                <option value="143"/>
                <option value="144"/>
                <option value="145"/>
                <option value="146"/>
                <option value="147"/>
                <option value="148"/>
                <option value="149"/>
                <option value="150"/>
                <option value="151"/>
                <option value="152"/>
                <option value="153"/>
                <option value="154"/>
                <option value="155"/>
                <option value="156"/>
                <option value="157"/>
                <option value="158"/>
                <option value="159"/>
                <option value="160"/>
                <option value="161"/>
                <option value="162"/>
                <option value="163"/>
                <option value="164"/>
                <option value="165"/>
                <option value="166"/>
                <option value="167"/>
                <option value="168"/>
                <option value="169"/>
                <option value="170"/>
                <option value="171"/>
                <option value="172"/>
                <option value="173"/>
                <option value="174"/>
                <option value="175"/>
                <option value="176"/>
                <option value="177"/>
                <option value="178"/>
                <option value="179"/>
                <option value="180"/>
              </datalist>
              </label></td>
            <td rowspan="2"><input name="pd" type="text"id="pd"size="8"list="ide4"/>
              <datalist id="ide4">
                <option value="45"/>
                <option value="46"/>
                <option value="47"/>
                <option value="48"/>
                <option value="49"/>
                <option value="50"/>
                <option value="51"/>
                <option value="52"/>
                <option value="53"/>
                <option value="54"/>
                <option value="55"/>
                <option value="56"/>
                <option value="57"/>
                <option value="58"/>
                <option value="59"/>
                <option value="60"/>
                <option value="61"/>
                <option value="62"/>
                <option value="63"/>
                <option value="64"/>
                <option value="65"/>
                <option value="66"/>
                <option value="67"/>
                <option value="68"/>
                <option value="69"/>
                <option value="70"/>
                <option value="71"/>
                <option value="72"/>
                <option value="73"/>
                <option value="74"/>
                <option value="75"/>
                <option value="76"/>
                <option value="77"/>
                <option value="78"/>
                <option value="79"/>
                <option value="80"/>
              </datalist>
            </td>
            <td><input name="Rlengjing" id="Rlengjing" type="text"size="6"/>
            </td>
            <td><input name="Rjidi" id="Rjidi" type="text"size="6"/></td>
            <td><input name="Rcorrected" type="text"id="Rcorrected"size="8"list="ide5" value="1.0"/>
              <datalist id="ide5">
                <option value="0.1"/>
                <option value="0.2"/>
                <option value="0.3"/>
                <option value="0.4"/>
                <option value="0.5"/>
                <option value="0.6"/>
                <option value="0.7"/>
                <option value="0.8"/>
                <option value="0.9"/>
                <option value="1.0"/>
                <option value="1.1"/>
                <option value="1.2"/>
                <option value="1.3"/>
                <option value="1.4"/>
                <option value="1.5"/>
                <option value="1.6"/>
                <option value="1.7"/>
                <option value="1.8"/>
                <option value="1.9"/>
                <option value="2.0"/>
              </datalist>
            </td>
            <td><input name="Rluoshi" type="text"id="Rluoshi"size="8"list="ide6"/>
              <datalist id="ide6">
                <option value="0.1"/>
                <option value="0.2"/>
                <option value="0.3"/>
                <option value="0.4"/>
                <option value="0.5"/>
                <option value="0.6"/>
                <option value="0.7"/>
                <option value="0.8"/>
                <option value="0.9"/>
                <option value="1.0"/>
                <option value="1.1"/>
                <option value="1.2"/>
                <option value="1.3"/>
                <option value="1.4"/>
                <option value="1.5"/>
                <option value="1.6"/>
                <option value="1.7"/>
                <option value="1.8"/>
                <option value="1.9"/>
                <option value="2.0"/>
              </datalist></td>
            <td><input name="Radd" id="Radd" type="text"size="6"/></td>
            <td><input name="Rtonggao" id="Rtonggao" type="text"size="6"/></td>
            <td><input name="Rjihu" id="Rjihu" type="text"size="6"/></td>
            <td><input name="RPD" id="RPD" type="text"size="6"/></td>
            <td><label>
              <input name="opttype1" id="opttype1" type="radio" value="0" checked>
              </label>
              远用 </td>
          </tr>
          <tr height="40px">
            <td>L</td>
            <td><input name="leftsph" type="text"id="leftsph"size="8"list="ide7"/>
              <datalist id="ide7">
                <option value="800"/>
                <option value="775"/>
                <option value="750"/>
                <option value="725"/>
                <option value="700"/>
                <option value="675"/>
                <option value="650"/>
                <option value="625"/>
                <option value="600"/>
                <option value="575"/>
                <option value="550"/>
                <option value="525"/>
                <option value="500"/>
                <option value="475"/>
                <option value="450"/>
                <option value="425"/>
                <option value="400"/>
                <option value="375"/>
                <option value="350"/>
                <option value="325"/>
                <option value="300"/>
                <option value="275"/>
                <option value="250"/>
                <option value="225"/>
                <option value="200"/>
                <option value="175"/>
                <option value="150"/>
                <option value="125"/>
                <option value="100"/>
                <option value="75"/>
                <option value="50"/>
                <option value="25"/>
                <option value="0"/>
                <option value="-25"/>
                <option value="-50"/>
                <option value="-75"/>
                <option value="-100"/>
                <option value="-125"/>
                <option value="-150"/>
                <option value="-175"/>
                <option value="-200"/>
                <option value="-225"/>
                <option value="-250"/>
                <option value="-275"/>
                <option value="-300"/>
                <option value="-325"/>
                <option value="-350"/>
                <option value="-375"/>
                <option value="-400"/>
                <option value="-425"/>
                <option value="-450"/>
                <option value="-475"/>
                <option value="-500"/>
                <option value="-525"/>
                <option value="-550"/>
                <option value="-575"/>
                <option value="-600"/>
                <option value="-625"/>
                <option value="-650"/>
                <option value="-675"/>
                <option value="-700"/>
                <option value="-725"/>
                <option value="-750"/>
                <option value="-775"/>
                <option value="-800"/>
                <option value="-825"/>
                <option value="-850"/>
                <option value="-875"/>
                <option value="-900"/>
                <option value="-925"/>
                <option value="-950"/>
                <option value="-975"/>
                <option value="-1000"/>
              </datalist></td>
            <td><input name="leftcyl" type="text"id="leftcyl"size="8"list="ide8"/>
              <datalist id="ide8">
                <option value="200"/>
                <option value="175"/>
                <option value="150"/>
                <option value="125"/>
                <option value="100"/>
                <option value="75"/>
                <option value="50"/>
                <option value="25"/>
                <option value="0"/>
                <option value="-25"/>
                <option value="-50"/>
                <option value="-75"/>
                <option value="-100"/>
                <option value="-125"/>
                <option value="-150"/>
                <option value="-175"/>
                <option value="-200"/>
              </datalist></td>
            <td><input name="leftax" type="text"id="leftax"size="8"list="ide9"/>
              <datalist id="ide9">
                <option value="1"/>
                <option value="2"/>
                <option value="3"/>
                <option value="4"/>
                <option value="5"/>
                <option value="6"/>
                <option value="7"/>
                <option value="8"/>
                <option value="9"/>
                <option value="10"/>
                <option value="11"/>
                <option value="12"/>
                <option value="13"/>
                <option value="14"/>
                <option value="15"/>
                <option value="16"/>
                <option value="17"/>
                <option value="18"/>
                <option value="19"/>
                <option value="20"/>
                <option value="21"/>
                <option value="22"/>
                <option value="23"/>
                <option value="24"/>
                <option value="25"/>
                <option value="26"/>
                <option value="27"/>
                <option value="28"/>
                <option value="29"/>
                <option value="30"/>
                <option value="31"/>
                <option value="32"/>
                <option value="33"/>
                <option value="34"/>
                <option value="35"/>
                <option value="36"/>
                <option value="37"/>
                <option value="38"/>
                <option value="39"/>
                <option value="40"/>
                <option value="41"/>
                <option value="42"/>
                <option value="43"/>
                <option value="44"/>
                <option value="45"/>
                <option value="46"/>
                <option value="47"/>
                <option value="48"/>
                <option value="49"/>
                <option value="50"/>
                <option value="51"/>
                <option value="52"/>
                <option value="53"/>
                <option value="54"/>
                <option value="55"/>
                <option value="56"/>
                <option value="57"/>
                <option value="58"/>
                <option value="59"/>
                <option value="60"/>
                <option value="61"/>
                <option value="62"/>
                <option value="63"/>
                <option value="64"/>
                <option value="65"/>
                <option value="66"/>
                <option value="67"/>
                <option value="68"/>
                <option value="69"/>
                <option value="70"/>
                <option value="71"/>
                <option value="72"/>
                <option value="73"/>
                <option value="74"/>
                <option value="75"/>
                <option value="76"/>
                <option value="77"/>
                <option value="78"/>
                <option value="79"/>
                <option value="80"/>
                <option value="81"/>
                <option value="82"/>
                <option value="83"/>
                <option value="84"/>
                <option value="85"/>
                <option value="86"/>
                <option value="87"/>
                <option value="88"/>
                <option value="89"/>
                <option value="90"/>
                <option value="91"/>
                <option value="92"/>
                <option value="93"/>
                <option value="94"/>
                <option value="95"/>
                <option value="96"/>
                <option value="97"/>
                <option value="98"/>
                <option value="99"/>
                <option value="100"/>
                <option value="101"/>
                <option value="102"/>
                <option value="103"/>
                <option value="104"/>
                <option value="105"/>
                <option value="106"/>
                <option value="107"/>
                <option value="108"/>
                <option value="109"/>
                <option value="110"/>
                <option value="111"/>
                <option value="112"/>
                <option value="113"/>
                <option value="114"/>
                <option value="115"/>
                <option value="116"/>
                <option value="117"/>
                <option value="118"/>
                <option value="119"/>
                <option value="120"/>
                <option value="121"/>
                <option value="122"/>
                <option value="123"/>
                <option value="124"/>
                <option value="125"/>
                <option value="126"/>
                <option value="127"/>
                <option value="128"/>
                <option value="129"/>
                <option value="130"/>
                <option value="131"/>
                <option value="132"/>
                <option value="133"/>
                <option value="134"/>
                <option value="135"/>
                <option value="136"/>
                <option value="137"/>
                <option value="138"/>
                <option value="139"/>
                <option value="140"/>
                <option value="141"/>
                <option value="142"/>
                <option value="143"/>
                <option value="144"/>
                <option value="145"/>
                <option value="146"/>
                <option value="147"/>
                <option value="148"/>
                <option value="149"/>
                <option value="150"/>
                <option value="151"/>
                <option value="152"/>
                <option value="153"/>
                <option value="154"/>
                <option value="155"/>
                <option value="156"/>
                <option value="157"/>
                <option value="158"/>
                <option value="159"/>
                <option value="160"/>
                <option value="161"/>
                <option value="162"/>
                <option value="163"/>
                <option value="164"/>
                <option value="165"/>
                <option value="166"/>
                <option value="167"/>
                <option value="168"/>
                <option value="169"/>
                <option value="170"/>
                <option value="171"/>
                <option value="172"/>
                <option value="173"/>
                <option value="174"/>
                <option value="175"/>
                <option value="176"/>
                <option value="177"/>
                <option value="178"/>
                <option value="179"/>
                <option value="180"/>
              </datalist>
            </td>
            <td><input name="Llengjing" id="Llengjing" type="text"size="6"/></td>
            <td><input name="Ljidi" id="Ljidi" type="text"size="6"/></td>
            <td><input name="Lcorrected" type="text"id="Lcorrected"size="8"list="ide10" value="1.0"/>
              <datalist id="ide10">
                <option value="0.1"/>
                <option value="0.2"/>
                <option value="0.3"/>
                <option value="0.4"/>
                <option value="0.5"/>
                <option value="0.6"/>
                <option value="0.7"/>
                <option value="0.8"/>
                <option value="0.9"/>
                <option value="1.0"/>
                <option value="1.1"/>
                <option value="1.2"/>
                <option value="1.3"/>
                <option value="1.4"/>
                <option value="1.5"/>
                <option value="1.6"/>
                <option value="1.7"/>
                <option value="1.8"/>
                <option value="1.9"/>
                <option value="2.0"/>
              </datalist>
            </td>
            <td><input name="Lluoshi" type="text"id="Lluoshi"size="8"list="ide11"/>
              <datalist id="ide11">
                <option value="0.1"/>
                <option value="0.2"/>
                <option value="0.3"/>
                <option value="0.4"/>
                <option value="0.5"/>
                <option value="0.6"/>
                <option value="0.7"/>
                <option value="0.8"/>
                <option value="0.9"/>
                <option value="1.0"/>
                <option value="1.1"/>
                <option value="1.2"/>
                <option value="1.3"/>
                <option value="1.4"/>
                <option value="1.5"/>
                <option value="1.6"/>
                <option value="1.7"/>
                <option value="1.8"/>
                <option value="1.9"/>
                <option value="2.0"/>
              </datalist></td>
            <td><input name="Ladd" id="Ladd" type="text"size="6"/></td>
            <td><input name="Ltonggao" id="Ltonggao" type="text"size="6"/></td>
            <td><input name="Ljihu" id="Ljihu" type="text"size="6"/></td>
            <td><input name="LPD" id="LPD" type="text"size="6"/></td>
            <td><input type="radio" name="opttype2" id="opttype2" value="1">
              近用</td>
          </tr>
          <tr>
          	<td colspan="2">
          	被检人：
          	</td>>
          	<td colspan="2">
          	<input type="text" class="input-txt" id="optname" size="8" >
          	</td>>
          	<td colspan="2">
          	验光师：
          	</td>>
          	<td colspan="2">
          	<input type="text" class="input-txt" autocomplete="off">
          	</td>>
          	<td colspan="2">
          	导购员：
          	</td>>
          	<td colspan="2">
          	<input type="text" class="input-txt" autocomplete="off">
          	</td>>
          	<td colspan="2">
          	
          	</td>
          <tr>
          	<td colspan="2">
          	验光日期：
          	</td>
          	<td colspan="2">
          	<input type="date" id="ygdate"  value="">
          	</td>
          	<td colspan="2">
          	备注： 
          	</td>
          	<td colspan="8">
          	<input name="remark" type="text" id="remark" value="" size="65">
          	</td>
        </table>
      </div>
      <div align="center"  style="font-size:16px; font-weight:bold;">
        <p><span class="ui-combo-wrap" id="dgsales">
          <input name="text" type="text" class="input-txt" autocomplete="off">
          </span></p>
        <p>配镜信息</p>
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="grid-wrap">
      <table id="grid">
      </table>
    </div>
    <div class="con-footer cf">
		<tabel class='table11_3'>
			<tr>
				<th>
				优惠金额:
				</th>
				<th>
				优惠后金额:
				</th>
				<th>
				承担费用:
				</th>
				<th>
				本次收款:
				</th>
			</tr>
			<tr>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
			</tr>
			<tr>
				<td>
				结算账户:
				</td>
				<td>
				
				</td>
				<td>
				本次欠款:
				</td>
				<td>
				审核人:
				</td>
			</tr>
		</tabel>

  <div id="initCombo" class="dn">
    <input type="text" class="textbox goodsAuto" name="goods" autocomplete="off">
    <input type="text" class="textbox storageAuto" name="storage" autocomplete="off">
    <input type="text" class="textbox unitAuto" name="unit" autocomplete="off">
    <input type="text" class="textbox batchAuto" name="batch" autocomplete="off">
    <input type="text" class="textbox dateAuto" name="date" autocomplete="off">
    <input type="text" class="textbox priceAuto" name="price" autocomplete="off">
    <input type="hidden" id="ecsdate" name="ecsdate" value="">
  </div>
</div>
</div>
</div>
</div>