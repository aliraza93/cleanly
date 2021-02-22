<template>
    <div class="wrap">
    <div class="modal fade" id="add-services" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Add Services</h4>
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
                            <input type="text" placeholder="Name of the Service here..." class="form-control" v-model="services.name">
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
                            <input type="text" placeholder="Price of the Service goes here..." class="form-control" v-model="services.price">
                          </div>
                          <!-- /.input group -->
                        </div>
                    </div>  
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <br>
            <button @click="addServices" type="button" class="btn btn-success waves-effect">SAVE</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
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
  mixins: [mixin],

  data() {
    return {
      services: {
          name: '',
          price: ''
      },

      errors: null
    };
  },

  methods: {
    addServices() {
      axios
        .post(base_url + "service", this.services)

        .then(response => {
          $("#add-services").modal("hide");

          this.services = {
              name: '',
              price: ''    
          };
          this.errors = null;
          EventBus.$emit("services-added", response.data);

          //this.showMessage(response.data);
          this.$toast.success('Services Added Successfully !', 'Success', { timeout: 3000 } );
          //window.location.href = "service";
        })
        .catch(err => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.$toast.error('Something Went Wrong', 'Error', { timeout: 3000 } );
          }
        });
    }
  },

  // end of method section

  created() {}
};
</script>