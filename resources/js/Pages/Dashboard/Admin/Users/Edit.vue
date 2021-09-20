<template>
  <dashboard title="Edit User" :user="editUser">
    <div
      class="bg-gray-100 p-6 rounded pt-20 shadow overflow-y-auto"
      style="height: 550px"
    >
      <h2
        class="text-2xl w-9/12 mx-auto font-medium mb-5 text-gray-500 uppercase"
      >
        Update user
      </h2>
      <div class="container w-9/12 mx-auto px-4 mb-12 mt-8">
        <form @submit.prevent="OnUpdate(user.id)">
          <div class="sm:w-3/4 mx-auto">
            <div>
              <div class="mb-4">
                <label for="job title" class="uppercase">Name</label>
                <input
                  type="name"
                  v-model="fields.name"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
              </div>

              <div class="mb-4">
                <label for="job location" class="uppercase">Email</label>
                <input
                  type="text"
                  v-model="fields.email"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
              </div>
              <div class="mb-4">
                <label for="company Logo" class="uppercase">Avatar</label>
                <input
                  type="file"
                  @change="onInputChange"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
              </div>
            </div>
            <div class="flex justify-center mt-10">
              <button
                type="submit"
                class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none"
              >
                Save Change
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </dashboard>
</template>

<script>
import Dashboard from "./../../Layouts/dashboard";
import Multiselect from "vue-multiselect";

export default {
  components: {
    Dashboard,
    Multiselect,
  },
  props: ["user", "editUser"],

  data() {
    return {
      fields: this.user,
      path: "",
      value: [],
    };
  },
  methods: {
    onInputChange(e) {
      const file = e.target.files[0];
      this.path = file;

      console.log(this.path);
    },

    OnUpdate(id) {
      let passData = this.fields;

      if(this.path) {
        const formData = new FormData();
        formData.append("avatar", this.path);
  
        _.each(this.fields, (value, key) => {
          formData.append(key, value);
        });
       passData = formData;
        
      }
      this.$inertia
        .post("/dashboard/users/update/" + id, passData)
        .then((res) => {})
        .catch((err) => {
          console.log(err);
        });
    },

    checked() {
      if (this.fields.status == 1) {
        this.fields.status = 0;
      } else {
        this.fields.status = 1;
      }
    },

    message(string) {
      swal({
        title: "Error",
        text: string,
        icon: "Error",
        // buttons:true
      });
      this.errors = null;
    },
  },
};
</script>