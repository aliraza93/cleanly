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
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
              <th>Saturday</th>
              <th>Sunday</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value,index) in timing.data" v-bind:key="index">
              <td>{{ tConvert(value.mon_start_time) }} - {{ tConvert(value.mon_end_time) }}</td>
              <td>{{ tConvert(value.tues_start_time) }} - {{ tConvert(value.tues_end_time) }}</td>
              <td>{{ tConvert(value.wednes_start_time) }} - {{ tConvert(value.wednes_end_time) }}</td>
              <td>{{ tConvert(value.thurs_start_time) }} - {{ tConvert(value.thurs_end_time) }}</td>
              <td>{{ tConvert(value.fri_start_time) }} - {{ tConvert(value.fri_end_time) }}</td>
              <td>{{ tConvert(value.satur_start_time) }} - {{ tConvert(value.satur_end_time) }}</td>
              <td>{{ tConvert(value.sun_start_time) }} - {{ tConvert(value.sun_end_time) }}</td>
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
        <update-timing></update-timing>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";

import UpdateTiming from "./UpdateTiming.vue";
import Pagination  from '../pagination/pagination.vue';

export default {
  mixins: [mixin],

  components: {
    "update-timing": UpdateTiming,
    "pagination": Pagination,
  },

  data() {
    return {
      timing: [],
      mon_start_time: '',
      mon_end_time: '',
      tues_start_time: '',
      tues_end_time: '',
      wednes_start_time: '',
      wednes_end_time: '',
      thurs_start_time: '',
      thurs_end_time: '',
      fri_start_time: '',
      fri_end_time: '',
      satur_start_time: '',
      satur_end_time: '',
      sun_start_time: '',
      sun_end_time: ''
    };
  },
  created() {
    var _this = this;
    this.getData();

    EventBus.$on("timing-added", function() {
      _this.getData();
    });
  },

  methods: {
    getData(page = 1) {
      this.isLoading = true;
      axios
        .get(
          base_url +
            "timing-list?page="+
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
      EventBus.$emit("timing-edit", id);
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
      axios.delete(base_url + "timing/" + id)
        .then(({data}) => {
            window.location.href = "timing";
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