<template>
    <div class="footer-container ">
        <div class="row mx-md-0 footer-top p-2 p-md-4">
            <div class="col-md-4">
                <ul>
                    <li>YaMal Al Sham</li>
                    <li class="mt-2">
                        <img class="scale" width="30px"  :src="'/iconic/facebook.png'" alt="FB"> 
                        <img class="scale ml-2" width="30px"  :src="'/iconic/twitter.png'" alt="twitter"> 
                        <img class="scale ml-2" width="30px"  :src="'/iconic/instagram.png'" alt="instagram"> 
                    </li>
                    <li class="mt-2">
                        info@yamalalsham.com
                    </li>
                    <li class="mt-2" >
                        1-844-7yamal
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li class="mt-2">Menu</li>
                    <li class="mt-2"><a href="/about">About</a></li>
                    <li class="mt-2"><a href="">Contact Us</a></li>
                    <li class="mt-2"><a href="">Department</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <iframe width="100%" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="py-2 ml-3 ml-md-0 m-0">Yamal Al Sham &copy; 2021 All Rights Reserved</p>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Foot',
    methods:{
        hoverGreen: function(e, newV, oldV){
          //  e.target.setAttribute('src', newV);
          e.target.addEventListener('mouseenter', function(){
              e.target.setAttribute('src', newV);
          });
          e.target.addEventListener('mouseout', function(){
              e.target.setAttribute('src', oldV);
          });
        }
    }
}
</script>
<style lang="scss" scoped>
 .footer-container{
     .footer-top{
         background-color: #212120;
         color: #fff;
         ul{ 
             li{
                 a{
                     color: #808080;
                 }
             }
             color: #808080;
             li:nth-child(1){
                 font-weight: 400;
                 font-size: 1.2rem;
                 color: #fff;      
                 img{
                     transition: 2s;
                     animation: hover 1s ease-in-out;
                     &:hover{
                         animation: hover 1s ease-in-out;
                     }
                 }
         
             }
         }
     }
     .footer-bottom{
         background-color: #308409;
         color: #fff;
         text-align: center;
         p{
             width: 100%;
             text-align: center;
         }
     }
 }

.scale{
    transition: 0.2s;
    cursor: pointer;
    &:hover{
        transform: scale(1.1);
    }
}
@keyframes hover {
    0%{
        opacity: 0
    }
    100%{
        opacity: 1;
    }
    
}
</style>