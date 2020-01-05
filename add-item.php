<?php require('php/init.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall [Add New Item]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="images/ico.png"/>
<link rel="stylesheet" type="text/css" href="plugins/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/icons/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="plugins/labeauty/custom-tick.css"/>
<link rel="stylesheet" type="text/css" href="styles/_add-item.css"/>
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/sub-pages.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="super_container">
	   <section class="header-top">
      <?php require('php/header.php');?>
</section>
<div class="main-container">
        <div actas="container" class="upload-container">
              <div class="title"><b>Home</b>/Add new Item</div>
           <div actas="header" class="upload-header" >
            <section class="selcted-sample-view">
                <section class="selected-samples-wrp"  state="active">
                    <div class="uploadPreview-wrapper view1"  onclick="choosePhoto(this)">
                      <img vindex="1"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader1"><img src="images/loader.gif"></div>
                    </div> 
                    <div class="uploadPreview-wrapper view2">
                      <img vindex="2"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader2"><img src="images/loader.gif"></div>
                    </div> 
                    <div class="uploadPreview-wrapper view3">
                      <img vindex="3"  src="images/f-chooser-ico.png" onerror="onImageError(this);" > 
                       <div  class="loaderWrapper loader3"><img src="images/loader.gif"></div>
                    </div> 
                    <div class="uploadPreview-wrapper view4">
                      <img vindex="4"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader4"><img src="images/loader.gif"></div>
                    </div> 
                    <div class="uploadPreview-wrapper view5">
                      <img vindex="5"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader5"><img src="images/loader.gif"></div>
                    </div>  
                    <div class="uploadPreview-wrapper view6">
                      <img vindex="6"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader6"><img src="images/loader.gif"></div>
                    </div> 
                     <div class="uploadPreview-wrapper view7">
                      <img vindex="7"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader7"><img src="images/loader.gif"></div>
                    </div> 
                   <div class="uploadPreview-wrapper view8">
                      <img vindex="8"  src="images/f-chooser-ico.png" onerror="onImageError(this);"> 
                       <div class="loaderWrapper loader8"><img src="images/loader.gif"></div>
                    </div> 
                </section>
            </section>
        </div>
        <div actas="body" class="upload-body">
            <input type="text" class="capitalize input_field" name="i-name" id="i-name" placeholder="Item Name">
            <div class="autocomplete">
                <input type="text" class="capitalize input_field"  autocomplete="off"  name="i-category"  id="i-category" placeholder="Item Category">
            </div>
            <input type="text"name="i-price" id="i-price" class="input_field" placeholder="Price">
             <div actas="3d-layout" class="upload-2dLayout" style="margin-top: 5px">
            
                  <div actas="layout">
                    <input type="tel" placeholder="Quantity" class="required input_field" type="text" name="i-quantity" id="i-quantity">
                </div>
                <div actas="layout">
                    <input type="tel" placeholder="Vendor ( Klassy Mall)" class="required input_field" type="text" name="i-vendor" id="i-vendor">
                </div>
                <div actas="layout" class="layout">
                    <select  class="required input_field" name="i-duration" id="i-duration">
                    <option value="null" selected>Delivery Duration</option> 
                        <option>1 to 2 Weeks</option> 
                        <option>2 to 4 Weeks</option>
                        <option>3 to 6 Weeks</option>
                        <option>6 to 1 Year</option>
                        <option>1 to 2 Years</option>
                    </select>
                </div>
            </div>
            <div actas="3d-layout" class="upload-2dLayout">
                <div actas="layout" class="layouts">
                    <select class="required input_field"  name="i-target" id="i-target">
                      <option value="null" selected>Target</option> 
                        <option>Ladies</option> 
                        <option>Children</option>
                        <option>Men</option> 
                        <option>Boys</option> 
                        <option>Kids</option> 
                        <option>Both</option>
                    </select>
                </div>
               <div actas="layout" class="layout">
                    <select class="required input_field"  name="i-discount" id="i-discount">
                      <option selected>No Discount</option> 
		              <option value="2">2% Discount</option> 
		              <option value="3">3% Discount</option> 
		              <option value="4">4% Discount</option> 
		              <option value="5">5% Discount</option> 
		              <option value="6">6% Discount</option>
		              <option value="7">7% Discount</option>  
		              <option value="8">8% Discount</option> 
		              <option value="9">9% Discount</option> 
		              <option value="10">10% Discount</option> 
		              <option value="11">11% Discount</option> 
		              <option value="12">12% Discount</option> 
		              <option value="13">13% Discount</option>
		              <option value="14">14% Discount</option> 
		              <option value="15">15% Discount</option> 
		              <option value="16">16% Discount</option> 
		              <option value="17">17% Discount</option>
		              <option value="18">18% Discount</option> 
		              <option value="19">19% Discount</option> 
		              <option value="20">20% Discount</option> 
		              <option value="21">21% Discount</option>
		              <option value="22">22% Discount</option>
		              <option value="23">23% Discount</option> 
		              <option value="20">24% Discount</option>
		              <option value="25">25% Discount</option> 
		              <option value="26">26% Discount</option> 
		              <option value="27">27% Discount</option> 
		              <option value="28">28% Discount</option>
		              <option value="29">29% Discount</option>
		              <option value="30">30% Discount</option>
		              <option value="31">31% Discount</option> 
		              <option value="32">32% Discount</option>
		              <option value="33">33% Discount</option> 
		              <option value="34">34% Discount</option> 
		              <option value="35">35% Discount</option> 
		              <option value="36">36% Discount</option>
		              <option value="37">37% Discount</option>
		              <option value="38">38% Discount</option>
		              <option value="39">39% Discount</option> 
		              <option value="40">40% Discount</option> 
		              <option value="41">41% Discount</option> 
		              <option value="42">42% Discount</option>
		              <option value="43">43% Discount</option> 
		              <option value="44">44% Discount</option>
		              <option value="45">45% Discount</option>
		              <option value="46">46% Discount</option> 
		              <option value="47">47% Discount</option> 
		              <option value="48">48% Discount</option> 
		              <option value="49">49% Discount</option>
		              <option value="50">50% Discount</option> 
		              <option value="51">51% Discount</option> 
		              <option value="52">52% Discount</option> 
		              <option value="53">53% Discount</option> 
		              <option value="54">54% Discount</option> 
		              <option value="55">55% Discount</option> 
		              <option value="56">56% Discount</option>
		              <option value="57">57% Discount</option>  
		              <option value="58">58% Discount</option> 
		              <option value="59">59% Discount</option> 
		              <option value="60">60% Discount</option> 
		              <option value="61">61% Discount</option> 
		              <option value="62">62% Discount</option> 
		              <option value="63">63% Discount</option>
		              <option value="64">64% Discount</option> 
		              <option value="65">65% Discount</option> 
		              <option value="66">66% Discount</option> 
		              <option value="67">67% Discount</option>
		              <option value="68">68% Discount</option> 
		              <option value="69">69% Discount</option> 
		              <option value="70">70% Discount</option> 
		              <option value="71">71% Discount</option>
		              <option value="72">72% Discount</option>
		              <option value="73">73% Discount</option> 
		              <option value="74">74% Discount</option>
		              <option value="75">75% Discount</option> 
		              <option value="76">76% Discount</option> 
		              <option value="77">77% Discount</option> 
		              <option value="78">78% Discount</option>
		              <option value="79">79% Discount</option>
		              <option value="80">80% Discount</option>
		              <option value="81">81% Discount</option> 
		              <option value="82">82% Discount</option>
		              <option value="83">83% Discount</option> 
		              <option value="84">84% Discount</option> 
		              <option value="85">85% Discount</option> 
		              <option value="86">86% Discount</option>
		              <option value="87">87% Discount</option>
		              <option value="88">88% Discount</option>
		              <option value="89">89% Discount</option> 
		              <option value="90">90% Discount</option> 
		              <option value="91">91% Discount</option> 
		              <option value="92">92% Discount</option>
		              <option value="93">93% Discount</option> 
		              <option value="94">94% Discount</option>
		              <option value="95">95% Discount</option>
		              <option value="96">96% Discount</option> 
		              <option value="97">97% Discount</option> 
		              <option value="98">98% Discount</option> 
		              <option value="99">99% Discount</option>
						</select>
                </div>
                <div actas="layout" class="layout">
                    <select class="required input_field" name="i-warranty" id="i-warranty">
                    <option selected>No warranty</option>
                    <option>7 days warranty</option> 
                    <option>14 days warranty</option> 
                    <option>21 days warranty</option> 
                    <option>1 month warranty</option> 
                    <option>2 months warranty</option> 
                    <option>3 months warranty</option> 
                    <option>4 months warranty</option> 
                    <option>5 months warranty</option> 
                    <option>6 months warranty</option> 
                    <option>7 months warranty</option> 
                    <option>8 months warranty</option> 
                    <option>9 months warranty</option> 
                    <option>10 months warranty</option> 
                    <option>11 months warranty</option> 
                    <option>12 months warranty</option> 
                    <option>More than 1 Year warranty</option> 
				</select>
                </div>
            </div>
            <textarea name="i-description" id="i-description" class="description text_field" wrap="hard" placeholder="Description"></textarea>
            <div class="alert alert-warning warnningAlert " transition="shake" state="inactive" role="alert">
                This is a warning alert—check it out!
            </div>
            <div class="alert alert-success successAlert " transition="shake" state="inactive"  role="alert">
                This is a warning alert—check it out!
            </div>
            <button type="button"  class="success btn-default right" name="continue-trigger">Continue</button>
        </div>
    </div>
	</div>
  </div>
	<!-- Newsletter -->
<section class="footer-bottom">
<?php require('php/footer.php')?>    
</section>
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="plugins/bootstrap4/popper.js"></script>
<script src="plugins/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/ayral/ayral.js"></script>
<script src="plugins/labeauty/custom-tick.js"></script>
<script src="plugins/jalert/jAlert.js"></script>
<script src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/ayral/ayral.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/labeauty/custom-tick.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>
<script type="text/javascript" src="js/autocomplete-module.js"></script>
<script type="text/javascript" src="js/add-item-module.js"></script>
</body>
</html>