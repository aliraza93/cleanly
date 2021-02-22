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
              <th>Date</th>
              <th>Time</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value,index) in timing.data" v-bind:key="index">
              <td>{{ value.date }}</td>
              <td>{{ tConvert(value.start_time) }} - {{ tConvert(value.end_time) }}</td>
              <td>
                <button
                  @click="editTiming(value.id)"
                  type="button"
                  class="btn bg-blue btn-circle waves-effect waves-circle waves-float"
                >
                  <i class="fa fa-edit"></i>
                </button>
              </td>
              <td>
                <button
                  @click="deleteTiming(value.id)"
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

       <pagination :pageData="timing"></pagination>

      <div class="row">
        <update-timing-overrides></update-timing-overrides>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";

import UpdateTiming from "./UpdateTimingOverrides.vue";
import Pagination  from '../pagination/pagination.vue';

export default {
  mixins: [mixin],

  components: {
    "update-timing-overrides": UpdateTiming,
    "pagination": Pagination,
  },

  data() {
    return {
      timing: [],
      date: '',
      start_time: '',
      end_time: ''
    };
  },
  created() {
    var _this = this;
    this.getData();

    EventBus.$on("timing-override-added", function() {
      _this.getData();
    });
  },

  methods: {
    getData(page = 1) {
      this.isLoading = true;
      axios
        .get(
          base_url +
            "timing-override-list?page="+
            page
        )
        .then(response => {
          // console.log(response.data);

          this.timing = response.data;
          this.isLoading = false;
        })
        .catch(error => {
          console.log(error);
        });
    },

    // edit vendor

    editTiming(id) {
      EventBus.$emit("timing-override-edit", id);
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
    deleteTiming (id) {
      axios.delete(base_url + "timing-override/" + id)
        .then(({data}) => {
            window.location.href = "timing-override";
            this.$toast.success('Timing Deleted Successfully !', 'Success', { timeout: 3000 } );
        });       
    },
    tConvert (time) {
      // Check correct time format and split into components
      time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

      if (time.length > 1) { // If time format correct
        time = time.slice (1);  // Remove full string match value
        time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
      }
      return time.join (''); // return adjusted time or original string
    }
  },

  computed: {



  }
};
</script>