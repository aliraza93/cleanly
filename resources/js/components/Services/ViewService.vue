<template>
  <div class="wrap">
    <div class="body">
      <div class="row">
        <div class="col-md-4">
          <input
            type="text"
            class="form-control"
            v-on:keyup="getData()"
            placeholder="Serach By Name"
                name=""
            v-model="name"
          >
        </div>
      </div>

       <div class="loading" v-if="isLoading">
                    <h2 style="text-align:center">Loading.......</h2>
        </div>

      <div class="table-responsive" v-else>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value,index) in services.data" v-bind:key="index">
              <td>{{ value.name }}</td>
              <td>{{ value.price }}</td>
              
              <td>
                <button
                  @click="editService(value.id)"
                  type="button"
                  class="btn bg-blue btn-circle waves-effect waves-circle waves-float"
                >
                  <i class="fa fa-edit"></i>
                </button>
              </td>
              <td>
                <button
                  @click="deleteService(value.id)"
                  type="button"
                  class="btn btn-sm btn-outline-danger"
                >
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

       <pagination :pageData="services"></pagination>

      <div class="row">
        <update-service></update-service>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";

import UpdateRate from "./UpdateService.vue";
import Pagination  from '../pagination/pagination.vue';

export default {
  mixins: [mixin],

  components: {
    "update-service": UpdateRate,
    "pagination": Pagination,
  },

  data() {
    return {
      services: [],
      name: '',
      price: ''
    };
  },
  created() {
    var _this = this;
    this.getData();

    EventBus.$on("service-added", function() {
      _this.getData();
    });
  },

  methods: {
    getData(page = 1) {
      this.isLoading = true;
      axios
        .get(
          base_url +
            "service-list?page="+
            page+
            "&size=" +
            this.name
        )
        .then(response => {
          // console.log(response.data);

          this.services = response.data;
          this.isLoading = false;
        })
        .catch(error => {
          console.log(error);
        });
    },

    // edit vendor

    editService(id) {
      EventBus.$emit("service-edit", id);
    },

    showMessage(data) {
      if (data.status == "success") {
        toastr.success(data.message, "Success Alert", { timeOut: 500 });
      } else {
        toastr.error(data.message, "Error Alert", { timeOut: 500 });
      }
    },
    pageClicked(pageNo) {
      var vm = this;
      vm.getData(pageNo);
    },
    deleteService (id) {
      axios.delete(base_url + "service/" + id)
        .then(({data}) => {
            window.location.href = "service";
            this.$toast.success('Service Deleted Successfully !', 'Success', { timeout: 3000 } );
        });       
    }
  },

  computed: {



  }
};
</script>