 <!-- Sidebar  -->
 <nav id="sidebar" class="sidebar">
     <div id="dismiss" class="dismiss">
         <i class="fas fa-arrow-right"></i>
     </div>

     <div class="sidebar-header">
         <h3>Your Cart :</h3>
     </div>

     <div class="cart-items"></div>

     <div class="footer">
         <div class="counts">
             <p class="cart-total">Total: <span>$555</span></p>
         </div>
     </div>
     <ul class="list-unstyled checkout">
        <li>
            <a href="#" class="clear-cart">Clear Cart</a>
        </li>
         
        <?php if (Helper::isGuest()) :?>
            <li>
            To make your order please <a href="/login" class="check-out">Sign In</a>
            </li>
        <?php else :?>
            <li>
                <a href="#" class="check-out checkout__now">Checkout</a>
            </li>
        <?php endif;?>
        <li>
             <a href="#" class="article">Continue Shopping</a>
        </li>
    </ul>
</nav>