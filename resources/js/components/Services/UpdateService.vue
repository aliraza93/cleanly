<template>
  <div class="wrap">
    <div class="modal fade" id="update-service" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Update Service</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" v-if="errors">
              <ul>
                <li v-for="error in errors" :key="error">{{ error[0] }}</li>
              </ul>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Name of Service:</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-puzzle-piece"></i></span>
                            </div>
                            <input type="text" placeholder="Name of the Service here..." class="form-control" v-model="service.name">
                          </div>
                          <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Price for the entered service:</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" placeholder="Price of the Service goes here..." class="form-control" v-model="service.price">
                          </div>
                          <!-- /.input group -->
                        </div>
                    </div>                      
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <br>
            <button @click="updateService" type="button" class="btn btn-success waves-effect">Update</button>
            <button  @click="resetForm()" type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";

export default {
  name : 'update-service',  
  mixins: [mixin],

  data() {
    return {
      service: {
        id: '',
        name: '',
        price: ''
      },
      errors: null
    };
  },

  
  created(){

      var _this = this;
       
     EventBus.$on('service-edit',function(id){
       
       _this.service.id = id;

       _this.getEditData(id);

       $('#update-service').modal('show');


 
     });

      $('#update-service').on('hidden.bs.modal', function(){
            _this.resetForm();
        });

  },

  methods: {
    
    getEditData(id){
     
     axios.get(base_url+'service/'+id+'/edit')

     .then(response => {
      
       
           this.service = {
            id : response.data.id,   
            name: response.data.name,
            price: response.data.price
          };

     })

    },

    updateService() {
        axios.post(base_url + "service/update/"+this.service.id, this.service)

        .then(response => {
          $("#update-service").modal("hide");
          this.resetForm();
          EventBus.$emit("service-created",1);
          this.$toast.success("Service Updated Successfully !", 'Success', { timeout: 3000 } );
          window.location.href = "service";
        })
        .catch(err => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.$toast.error("Something Went Wrong", 'Error', { timeout: 3000 } );
          }
        });
    },

     resetForm(){
    
          this.service = {
            id: '',
            name: '',
            price: ''
          };
          this.errors = null; 

  },

  },

 

  // end of method section

};
</script>