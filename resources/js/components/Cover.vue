<template>
    <div class="cover-container" >
     
        <div class="cover-img" style="background-image: url('../images/cover.jpg');">
            <div class="border-green px-1 px-md-2 pl-md-3"></div>
        </div>

        <div id="caro" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row p-2 ">
                        <div class="col-md-6 left-cover pt-md-5">
                            <h1 class="mt-md-5">Welcome To <br><span>Ya mal Al Sham</span> </h1>
                            <p class="mt-3 mt-md-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse adipisci nihil in 
                                cumque neque rem aspernatur voluptates voluptatum dolorem excepturi eius, ipsum minus quam magnam 
                                quisquam neque cum corporis sunt quis odit, officiis veritatis culpa beatae doloremque.
                            </p>
                            <div class="cover-buttons mt-5">
                                <button class="btn">About</button>
                                <button class="btn ml-md-2">Contact Us</button>
                            </div>
                        </div>
                        <div class="col-md-6 right-cover">     
                            <img class="d-none d-md-block" :src="'../images/veg1.jpg'" alt="vegtables" width="100%">
                        </div>
                    </div> 
                </div>
                <div class="carousel-item">
                    <div class="row p-2 ">
                        <div class="col-md-6 left-cover pt-md-5">
                            <h1 class="mt-md-5">Welcome To <br><span>Ya mal Al Sham</span> </h1>
                            <p class="mt-3 mt-md-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse adipisci nihil in 
                                cumque neque rem aspernatur voluptates voluptatum dolorem excepturi eius, ipsum minus quam magnam 
                                quisquam neque cum corporis sunt quis odit, officiis veritatis culpa beatae doloremque.
                            </p>
                            <div class="cover-buttons mt-5">
                                <button class="btn">About</button>
                                <button class="btn ml-md-2">Contact Us</button>
                            </div>
                        </div>
                        <div class="col-md-6 right-cover">     
                            <img class="d-none d-md-block" :src="'../images/veg1.jpg'" alt="vegtables" width="100%">
                        </div>
                    </div> 
                </div>
                <!-- <div class="carousel-item">
                another slide here
                </div> -->
            </div>
            <!-- for left and next buttons
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
    </div>
</template>
<script>
export default {
    name: 'Cover',
    data: function(){
        return{
            
        }
    }
}
</script>
<style lang="scss" scoped>
    
    $color1: #308409;
    
   .cover-container{
      
      .cover-img{
        position: absolute;
        width: 98.9vw ;
        height: 100vh;
        top:0;
        left:0;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: -1;
        &::before{
            content:'';
            position: absolute;
            background-color: rgba(255, 255, 255, 0.822);
           width: 100%;
            height: 100%;
            top:0;
            left:0;
        }
        &::after{
            content:'';
            position: absolute;
            background-color:  rgba(255, 255, 255, 0.664);
            width: 100%;
            height: 100%;
            top:0;
            left:0;
            clip-path: polygon(100% 0, 100% 0, 0 100%, 0 0);
        }
        .border-green{
            background-color: $color1;
            height: 320px;
            width:1px;
            position: absolute;
            top: 30%;
            left:0;
            z-index: 1;
        }
      }    
        #caro{
            height:80vh;
        }
        .left-cover{
          h1{
           color: $color1;
           font-weight: 700;
           text-transform: capitalize;
           font-size: 3rem;
                span{
                    color: #000;
                    font-weight: 900;
                }
           } 
           p{
               font-weight: 300;
               font-weight: 15px;
           }
           .cover-buttons{
               button{
                  background-color: #000;
                  color: #fff; 
                  font-size: 1.2rem;
                  font-weight: 400;
                  width: 10.5rem;
               } 
           }
       }

       .right-cover{
           img{
               border-radius: 50%;
           }
       }
   }
   

   @media screen and (max-width:992px){
       .cover-container{
           .cover-img{
               height: 100vh;
           }
       .left-cover{
           h1{
               font-size: 2rem;
           }
           .cover-buttons{
               button{
                  font-size: 1rem;
                  font-weight: 400;
                  width: 8rem;
               } 
           }
         }
         
       }
    }
</style>