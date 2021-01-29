<template>
    <div>
        <nav class="navbar navbar-expand-lg main-nav py-md-4">
            <div class="container-fluid mx-md-5">
                <a class="navbar-brand ml-md-5" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-md-3">
                           <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item mx-md-3">
                            <a class="nav-link" href="/departments">Departments</a>
                        </li>
                        <li class="nav-item mx-md-3">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li v-if="admin!=false" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{user.name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    name:'Navbar',
    props:{
        admin: Boolean,
        user: [Object, Boolean]
    },
    data: function(){
        return{

        }
    }
}
</script>
<style scoped lang="scss">
    $color1: #308409;
    .main-nav{
        .navbar-brand{
            font-size: 3rem;
        }
        li{
            a{
                font-weight: 500;
                font-size: 1rem;
                text-transform: uppercase;
            }
        }
    }
    .main-nav .navbar-nav .nav-link {
        color: #000;
        &.active{
                    color:$color1;
                }
    }
</style>