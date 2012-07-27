<!DOCTYPE HTML><html lang="en-US"><head>	<title>Shop</title>	<meta charset="UTF-8">	<style type="text/css">		body {			font: 13px Arial;		}        #bipin{            width: 800px;            padding: 0px;            margin: 0px auto;                    }		#products {        text-align: center; float: left;		}		#products ul {			list-style-type: none; margin: 0px;		}		#products li {			width: 150px; padding: 4px; margin: 8px;			border: 1px solid #ddd; background-color: #eee;			-moz-border-radius: 4px; -webkit-border-radius: 4px;		}		#products .name {			font-size: 15px; margin: 5px;		}		#products .price {			margin: 5px;		}		#products .option {			margin: 5px;		}		#cart {			padding: 4px; margin: 8px; float: left;			border: 1px solid #ddd; background-color: #eee;			-moz-border-radius: 4px; -webkit-border-radius: 4px;		}		#cart table {			width: 320px; border-collapse: collapse;			text-align: left;		}		#cart th {			border-bottom: 1px solid #aaa;					}		#cart caption {			font-size: 15px; height: 30px; text-align: left;		}		#cart .total {			height: 40px;		}   		#cart .remove a {			color: red;            		} 	</style>    <script>                function qyt_edit(arg1,arg2) {            var el = document.getElementById(arg1);            var e2 = document.getElementById(arg2);            el.style.display="none";            e2.style.display="inline";        }                function qyt_update(arg1,arg2,arg3,arg4){            var e1=document.getElementById(arg1);            var e2=document.getElementById(arg2);            var e3=document.getElementById(arg3);            var newvalue=e3.value;            document.getElementById(arg1).innerHTML=newvalue;            e2.style.display="none";            e1.style.display="block";            location.href = "http://192.168.1.208/pradeep.kumar/cisc/index.php/shop/update/"+arg4+"/"+newvalue;        }                function admin_login()        {            var child_window=window.open("http://192.168.1.208/pradeep.kumar/cisc/index.php/shop/admin_login","FORM_WINDOW", "height=240,width=400,top=200,left=600,resizable=no");            //window.opener.document.location.href='http://192.168.1.208/pradeep.kumar/shopping_cart/index.php/shop/admin_login';        }            </script>    </head><body>    <div id="bipin"">    <div style="float:right;margin-right: 150px">        <?php             $js = 'onClick="admin_login()"';            echo form_button('mybutton', 'Login as admin', $js);         ?>     </div>	<div id="products">	<ul>		<?php foreach ($products as $product): ?>		<li>			<?php echo form_open('shop/add'); ?>			<div class="name"><?php echo $product->name; ?></div>			<div class="thumb">			<?php echo img(array(				'src' => 'img/' . $product->image,				'class' => 'thumb',				'alt' => $product->name,                'height'=>100,                'width'=>100			)); ?>							</div>			<div class="price">$<?php echo $product->price; ?></div>			<div class="option">				<?php if ($product->option_name): ?>					<?php echo form_label($product->option_name, 'option_'. $product->id); ?>					<?php                           echo form_dropdown(                        $product->option_name,                        $product->option_values,                        NULL,                        'id="option_'. $product->id.'"'                        );                     ?>				<?php endif; ?>			</div>            <div class="quantity">                 <label>Quantity</label>                   <?php                    #echo form_input('quantity', '1', 'maxlength="2"','id="quantity"','size="6"');                  ?>                   <input type="text" name="quantity" maxlength="4" size="3" value="1" id="quantity"/><br />            </div>            <?php echo form_hidden('id', $product->id); ?>			<?php echo form_submit('action', 'Add to Cart'); ?>			<?php echo form_close(); ?>        </li>		<?php endforeach; ?>	</ul>	</div>	<?php        $cart=$this->cart->contents();        if ($cart):     ?>	<div id="cart">		<table>		<caption>Shopping Cart</caption>		<thead>			<tr>                <th width="500px">Item Name</th>				<th width="500px">Option</th>				<th width="500px">Price</th>                <th width="500px">quantity</th>				<th width="500px" align="center">Remove</th>			</tr>		</thead>        <?php $count=0; foreach ($cart as $item):            $count=$count+$item['qty'];            ?>			<tr>				<td><?php echo $item['name']; ?></td>				<td>					<?php if ($this->cart->has_options($item['rowid'])) {						foreach ($this->cart->product_options($item['rowid']) as $option => $value) {                            echo $option . ": <em>" . $value . "</em>";						}					} ?>				</td>				<td>$<?php echo $item['subtotal']; ?></td>                            <td id="<?php echo $item['id']; ?>" align="center">               <a href="javascript:qyt_edit('<?php echo '1'.$item['rowid']; ?>','<?php echo '2'.$item['rowid']; ?>')">                <p id="<?php echo '1'.$item['rowid']; ?>">                    <?php echo $item['qty']; ?>                </p>               </a>                               <p id="<?php echo '2'.$item['rowid']; ?>" style="display:none">                   <input type="text" id="<?php echo '3'.$item['rowid']; ?>"  size="2" value="<?php echo $item['qty']; ?>" >                   <a href="javascript:qyt_update('<?php echo '1'.$item['rowid']; ?>','<?php echo '2'.$item['rowid']; ?>','<?php echo '3'.$item['rowid']; ?>','<?php echo $item['rowid']; ?>')">done</a>               </p>            </td>            <td class="remove" align="center">                <?php echo anchor('shop/remove/'.$item['rowid'],'X'); ?>            </td>        </tr> 		<?php endforeach;?>		<tr class="total">            <td colspan="2"><strong>Total</strong></td>			<td>$<?php echo $this->cart->total(); ?></td>		</tr>		</table>		        <br /><br />        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">            <input type="hidden" name="cmd" value="_xclick">            <input type="hidden" name="hosted_button_id" value="P6RRG8XYYK9FU">            <input type="hidden" name="business" value="pradee_1342426268_biz@ballisticlearning.com">            <input type="hidden" name="item_name"  value="my shoping item list" >            	<input type="hidden" name="return" value="http://wwwww.pradeeptyagi.0fees.net/paypal.php">            <input type="hidden" name="item_number" value="1">            <input type="hidden" name="quantity" value="1">            <input type="hidden" name="amount" value="<?php echo $this->cart->total(); ?>">            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">        </form>                    <form action="https://secure-test.worldpay.com/wcc/purchase" name="BuyForm" method="POST">            <input type="hidden" name="instId"  value="211616">            <input type="hidden" name="cartId" value="abc123">            <input type="hidden" name="currency" value="USD">            <input type="hidden" name="address1"  value="loni ghaziabad">            <input type="hidden" name="name" value="sandeep kumar">            <!--<input type="hidden" name="MC_callback" value="http://http://192.168.1.208/pradeep.kumar/paypal.php"> -->            <input type="hidden" name="amount"  value="<?php echo $this->cart->total(); ?>">            <input type="hidden" name="desc" value="">            <p>            <input type="hidden" name="testMode" value="100">	                        <input type="submit" value="Pay by WorldPay">            </p>            </div>	<?php endif; ?>        </div></body></html>