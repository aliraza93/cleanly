<template>
  <div class="wrap">
    <div class="body">

       <div class="loading" v-if="isLoading">
                    <h2 style="text-align:center">Loading.......</h2>
        </div>

      <div class="table-responsive" v-else>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>No of Cleaning at once</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value,index) in cleaning.data" v-bind:key="index">
              <td>{{ value.number }}</td>
              <td>
                <button
                  @click="editCleaningService(value.id)"
                  type="button"
                  class="btn bg-blue btn-circle waves-effect waves-circle waves-float"
                >
                  <i class="fa fa-edit"></i>
                </button>
              </td>
              <td>
                <button
                  @click="deleteCleaningService(value.id)"
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

       <pagination :pageData="cleaning"></pagination>

      <div class="row">
        <update-service></update-service>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";

import UpdateTiming from "./UpdateService.vue";
import Pagination  from '../pagination/pagination.vue';

export default {
  mixins: [mixin],

  components: {
    "update-service": UpdateTiming,
    "pagination": Pagination,
  },

  data() {
    return {
      cleaning: [],
      number: ''
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
            "cleaning-list?page="+
            page
        )
        .then(response => {
          // console.log(response.data);

          this.cleaning = response.data;
          this.isLoading = false;
        })
        .catch(error => {
          console.log(error);
        });
    },

    // edit vendor

    editCleaningService(id) {
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
    deleteCleaningService (id) {
      axios.delete(base_url + "cleaning/" + id)
        .then(({data}) => {
            window.location.href = "cleaning";
            this.$toast.success('Cleaning Service Deleted Successfully !', 'Success', { timeout: 3000 } );
        });       
    }
  },

  computed: {



  }
};
</script>
