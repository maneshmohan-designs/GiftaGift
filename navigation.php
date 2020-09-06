 <div id="top"><a href="#">LOGIN|SIGNUP</a></div>
    <div id="head"> <a href="#">GIFT<span id="aa">A</span>GIFT</a><img id="logo" src="images/logo2.png">
        
  <div class="container-1">
      <span class="icon"><img src="images/search.png" width="22px"></span>
      <input type="search" id="search" placeholder="Search..." />
  </div>
        <span id="cart-btn"><img src="images/cart.png" width="30px"><h1>CART</h1></span>
        </div>
     <style>
#cart-btn
{
    position: absolute;
    display: inline-block;
    background-color: #3FA2B7;
    border-radius: 5px;
    width: 90px;
    height: 35px;
    top: 0;
    right: 20%;
    margin-top: .8%;
    color: white;
    font-family: "ubuntu light";
}
#cart-btn h1
{
    font-family: "Ubuntu light";
    font-size: 80%;
    display: inline-block; 
    position: absolute;
    margin-left: 5%;

}

#cart-btn img{
    position: relative;
    margin-left: 8%;
    margin-top: 5%;
}
#part2
{
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    top: 100%;
    background-color: aliceblue;
}
#top
{
    width: 100%;
    height: 10%;
    background-color:white;
   /* ackground-color: #00BAF2;*/
    display: block;
    position:fixed;
    float: left;
    padding-left: 20px;
    margin-left: -20px;
    margin-top: 0px;
    padding-top: 0px;
    top: 0;
    box-shadow: 0 4px 8px rgba(63, 162, 183,.19), 0 4px 4px rgba(0,0,0,0.23);
    z-index: 1;
    
}
#top a
{
    color: #3FA2B7;
    font-family: 'Ubuntu Light';
    right: 30px;
    display: block;
    position:absolute;
    text-decoration: none;
    font-size: 90%;
}
#head a
{
text-decoration: none;
    color: white;
   /*font-family: 'Ailerons';*/
    font-family:'Above DEMO';
    font-size: 150%;
    display: inline-block;
    font-weight: bold;
 margin-top: 1.3%;
    position: relative;
    float: left;
    margin-left: 14%;
    margin-right: 1%;


}
#aa
{
    color:#3FA2B7;
}
#logo
{
    width: 40px;
    margin-top: .4%;
    display: block;
    margin-left: 10px;
    margin-right: 10px;
    position: relative;    
}
#head
{
    width: 100%;
    height: 10%;
    background-color: #142735;
   /* ackground-color: #00BAF2;*/
    display: block;
    position:fixed;
    float: left;
    padding-left: 20px;
    margin-left: -20px;
    margin-top: 20px;
    padding-top: 0px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.19), 0 3px 3px rgba(0,0,0,0.23);
    z-index: 1;
}
.container-1{
  width: 200px;
  vertical-align: middle;
  white-space: nowrap;
  position:fixed;
    top: 28px;
    left: 30%;
}
.container-1 .icon{
  position:absolute;
    z-index: 10;
  margin-left: 0px;
  margin-top: 0px;
  z-index: 1;
    left: 0;
    margin-top: 18px;
  color: #4f5b66;

}
.container-1 input#search:hover, .container-1 input#search:focus, .container-1 input#search:active{
    outline:none;
    background: #ffffff;
  }
.container-1 input#search::-webkit-input-placeholder {
   color: rgba(20, 39, 53,1);
}
 
.container-1 input#search:-moz-placeholder { /* Firefox 18- */
   color: rgba(20, 39, 53,.5);  
}
 
.container-1 input#search::-moz-placeholder {  /* Firefox 19+ 
  color: rgba(20, 39, 53,.5); */
    color: white;
}
 
.container-1 input#search:-ms-input-placeholder {  
   color: rgba(20, 39, 53,.5);   
}
.container-1 input#search{
  width: 400px;
  height: 27px;
  background: rgb(29, 49, 63);
  border: none;
  font-size: 10pt;
  float: left;
    position: relative;
    margin-top: 15px;
  color: #262626;
  padding-left: 45px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
 
   
    -webkit-transition: background .55s ease;
  -moz-transition: background .55s ease;
  -ms-transition: background .55s ease;
  -o-transition: background .55s ease;
  transition: background .55s ease;
}
</style>