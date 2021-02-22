<template>
  <div class="wrap">
    <div class="body">
      <div class="row">
        <div class="col-md-4">
          <input
            type="text"
            class="form-control"
            v-on:keyup="getData()"
            placeholder="Serach By Size"
                name=""
            v-model="size"
          >
        </div>
        <div class="col-md-4">
          <input
            type="text"
            class="form-control"
            v-on:keyup="getData()"
            placeholder="Serach By Hours"
            name=""
            v-model="hours"
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
              <th>Size</th>
              <th>Hours</th>
              <th>Base Price</th>
              <th>Increment</th>
              <th>Two Bathrooms</th>
              <th>Three Bathrooms</th>
              <th>Four Bathrooms</th>
              <th>Five Bathrooms</th>
              <th>Six Bathrooms</th>
              <th>Seven Bathrooms</th>
              <th>Eight Bathrooms</th>
              <th>Nine Bathrooms</th>
              <th>Ten Bathrroms</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value,index) in rates.data" v-bind:key="index">
              <td>{{ value.size }}</td>
              <td>{{ value.hours }}</td>
              <td>{{ value.base }}</td>
              <td>{{ value.increment }}</td>
              <td>{{ value.two_bath }}</td>
              <td>{{ value.three_bath }}</td>
              <td>{{ value.four_bath }}</td>
              <td>{{ value.five_bath }}</td>
              <td>{{ value.six_bath }}</td>
              <td>{{ value.seven_bath }}</td>
              <td>{{ value.eight_bath }}</td>
              <td>{{ value.nine_bath }}</td>
              <td>{{ value.ten_bath }}</td>
              
              <td>
                <button
                  @click="editRate(value.id)"
                  type="button"
                  class="btn bg-blue btn-circle waves-effect waves-circle waves-float"
                >
                  <i class="fa fa-edit"></i>
                </button>
              </td>
              <td>
                <button
                  @click="deleteRate(value.id)"
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

       <pagination :pageData="rates"></pagination>

      <div class="row">
        <update-rate></update-rate>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";

import UpdateRate from "./UpdateRate.vue";
import Pagination  from '../pagination/pagination.vue';

export default {
  mixins: [mixin],

  components: {
    "update-rate": UpdateRate,
    "pagination": Pagination,
  },

  data() {
    return {
      rates: [],
      size: "",
      hours: "",
      base: "",
      increment: '',
      two_bath: "",
      three_bath : "",
      four_bath : "",
      five_bath : "",
      six_bath : "",
      seven_bath : "",
      eight_bath : "",
      nine_bath : "",
      ten_bath : "",
    };
  },
  created() {
    var _this = this;
    this.getData();

    EventBus.$on("rates-added", function() {
      _this.getData();
    });
  },

  methods: {
    getData(page = 1) {
      this.isLoading = true;
      axios
        .get(
          base_url +
            "rate-list?page="+
            page+
            "&size=" +
            this.size +
            "&hours=" +
            this.hours
        )
        .then(response => {
          // console.log(response.data);

          this.rates = response.data;
          this.isLoading = false;
        })
        .catch(error => {
          console.log(error);
        });
    },

    // edit vendor

    editRate(id) {
      EventBus.$emit("rate-edit", id);
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
    deleteRate (id) {
      axios.delete(base_url + "rate/" + id)
        .then(({data}) => {
            window.location.href = "rate";
            this.$toast.success('Rate Deleted Successfully !', 'Success', { timeout: 3000 } );
        });       
    }
  },

  computed: {



  }
};
</script>