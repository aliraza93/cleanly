<template>
  <div class="wrap">
    <div class="modal fade" id="update-rate" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Update Rate</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" v-if="errors">
              <ul>
                <li v-for="error in errors" :key="error">{{ error[0] }}</li>
              </ul>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter the Size" v-model="rate.size">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Estimated Hours" v-model="rate.hours">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Base Price" v-model="rate.base">
                        </div>
                    </div>

                    <div class="col-md-6">


                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Increment" v-model="rate.increment">
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <br>
            <button @click="updateRate" type="button" class="btn btn-success waves-effect">Update</button>
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
  name : 'update-rate',  
  mixins: [mixin],

  data() {
    return {
      rate: {
        id: '',
        size: "",
        hours: "",
        base: "",
        increment: '',
        two_bath: "",
        three_bath: "",
        four_bath: "",
        five_bath: "",
        six_bath: "",
        seven_bath: "",
        eight_bath: "",
        nine_bath: "",
        ten_bath: ""
      },
      errors: null
    };
  },

  
  created(){

      var _this = this;
       
     EventBus.$on('rate-edit',function(id){
       
       _this.rate.id = id;

       _this.getEditData(id);

       $('#update-rate').modal('show');


 
     });

      $('#update-rate').on('hidden.bs.modal', function(){
            _this.resetForm();
        });

  },

  methods: {
    
    getEditData(id){
     
     axios.get(base_url+'rate/'+id+'/edit')

     .then(response => {
      
       
           this.rate = {
            id : response.data.id,   
            size: response.data.size,
            hours: response.data.hours,
            base: response.data.base,
            increment: response.data.increment,
            two_bath: response.data.two_bath,
            three_bath: response.data.three_bath,
            four_bath: response.data.four_bath,
            five_bath: response.data.five_bath,
            six_bath: response.data.six_bath,
            seven_bath: response.data.seven_bath,
            eight_bath: response.data.eight_bath,
            nine_bath: response.data.nine_bath,
            ten_bath: response.data.ten_bath,
          };

     })

    },

    updateRate() {
        axios.post(base_url + "rate/update/"+this.rate.id, this.rate)

        .then(response => {
          $("#update-rate").modal("hide");
          this.resetForm();
          EventBus.$emit("rate-created",1);
          this.$toast.success("Rates Updated Successfully !", 'Success', { timeout: 3000 } );
          window.location.href = "rate";
        })
        .catch(err => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.$toast.error("Something Went Wrong", 'Error', { timeout: 3000 } );
          }
        });
    },

     resetForm(){
    
          this.rate = {
            id: '',
            size: "",
            hours: "",
            base: "",
            increment: '',
            two_bath: "",
            three_bath: "",
            four_bath: "",
            five_bath: "",
            six_bath: "",
            seven_bath: "",
            eight_bath: "",
            nine_bath: "",
            ten_bath: ""
          };
          this.errors = null; 

  },

  },

 

  // end of method section

};
</script>