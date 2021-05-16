<?php
function component($name,$price,$image,$id){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">    
            <form action=\"#\" method=\"POST\">
                <div class=\"card shadow\">
                    <div>
                        <img src=\"img/$image\" alt=\"img1\" class=\"img-fluid card-img-top\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$name</h5>
                        <h6>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"far fa-star\"></i>
                        </h6>
                        <p class=\"card-text\">IPHONE ARE JUST TO SHOWOFF YOUR DADDY'S MONEY</p>
                        <h5>
                            <small><s class=\"text-secondary\">$899</s></small>
                            <span class=\"price\">$price</span>
                        </h5>
                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"buy\">Buy Now <i class=\"fas fa-shopping-cart\"></i></button>
                        <input type=\"hidden\" name=\"price\" value = \"$price\">
                    </div>
                </div>
            </form>

        </div>";
echo $element;
}
?>