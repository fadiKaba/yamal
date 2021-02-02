<template>
    <div>
        video
        <div v-if="admin" class="add-video">
            <button 
            class="btn btn-primary mb-2" 
            type="button" 
            data-toggle="collapse" 
            data-target="#collapseExample" 
            aria-expanded="false" 
            aria-controls="collapseExample">
                Button with data-target
            </button>
            <div v-if="validationErrors != ''">
                <div v-if="validationErrors.video"  class="alert alert-danger">{{validationErrors.video[0]}}</div>
                <div v-if="validationErrors.video_description"  class="alert alert-danger">{{validationErrors.video_description[0]}}</div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form id="video-data" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="video_name">Video Name</label>
                            <textarea 
                            class="form-control" 
                            name="video_description" 
                            id="video_description" 
                            cols="30" 
                            rows="10">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Video</label>
                            <input class="form-control" type="file" name="video" id="video">
                            <small class="text-muted">video must be of type .mp4 and 40 MB of maximum size</small>
                        </div>
                        <button @click.prevent="storeVideo()" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
</template>
<script>
export default {
    name: 'Video',
    props:{
        admin: Boolean
    },
    data: function(){
        return{
            validationErrors: [],
            error: ''
        }
    },
    methods:{
        storeVideo: function(){
            let form = document.querySelector('#video-data');
            let data = new FormData(form);
            axios.post('/video', data)
            .then(response => {
                console.log(response)
            }).catch(err => {
               if(err.response){
                   console.log(err.response);
                   if(err.response.data.errors){
                       this.validationErrors = err.response.data.errors
                   }else{
                       this.error = err.response.message
                   }
               }
            })
        }
    }
}
</script>
<style lang="scss" scoped>

</style>