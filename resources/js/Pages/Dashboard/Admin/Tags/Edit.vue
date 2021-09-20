<template>
  <dashboard title="Edit tag" :user="user">
    <div
      class="bg-gray-100 p-6 rounded pt-20 shadow overflow-y-auto"
      style="height: 550px"
    >
      <!-- <div v-if="Object.keys(errors).length > 0 " class="text-red-400 border flex justify-center rounded p-4 border-red-400 bg-red-200 font-bold mb-1">
             {{ errors[Object.keys(errors)[0]][0] }}
           </div> -->
      <h2
        class="text-2xl w-9/12 mx-auto font-medium mb-5 text-gray-500 uppercase"
      >
        Update tag
      </h2>
      <div class="container w-9/12 mx-auto px-4 mb-12 mt-8">
        <form @submit.prevent="OnUpdate(tag.id)">
          <div class="sm:w-3/4 mx-auto">
            <div>
              <div class="mb-4">
                <label for="tag title" class="uppercase">tag title</label>
                <input
                  type="name"
                  v-model="fields.name"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
                
              </div>
            </div>
            <div class="flex justify-center mt-10">
              <button
                type="submit"
                class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none"
              >
                Post tag
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

export default {
  components: {
    Dashboard,
  },
  props: ["user", "errors", "tag"],

  data() {
    return {
      fields: this.tag,
      path: "",
      focusedEmail: false,
      focusedUrl: false,
      email: "",
      url: "",
      value: [],
      colors: [
        { name: "bg-red-300", text: "text-red-300", label: "Red" },
        { name: "bg-yellow-500", text: "text-yellow-500", label: "Yellow" },
        { name: "bg-blue-500", text: "text-blue-500", label: "Blue" },
        { name: "bg-gray-300", text: "text-gray-300", label: "SmiDark" },
        { name: "bg-green-300", text: "text-green-300", label: "Green" },
      ],
      options: this.tag.tags,
      editorConfig: {
        // The configuration of the editor.
        toolbar: [
          ["Bold", "Italic"],
          [
            "Styles",
            "Format",
            "Font",
            "FontSize",
            "BulletedList",
            "NumberedList",
            "InsertTable",
            "BlockQuote",
            "Undo",
            "Redo",
          ],
        ],
        height: 120,
        // toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'insertTable', 'blockQuote', 'undo', 'redo' ]
      },
    };
  },
  methods: {
    focusEmail() {
      this.focusedEmail = true;
      this.focusedUrl = false;
      this.url = "";
    },

    focusUrl() {
      this.focusedUrl = true;
      this.focusedEmail = false;
      this.email = "";
    },

    blurEmail() {
      // this.focusedEmail = false
      this.focusedUrl = false;
    },

    blurUrl() {
      // this.focusedUrl = false
      this.focusedEmail = false;
    },

    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
      };
      this.options.push(tag);
      this.value.push(tag);
    },

    onInputChange(e) {
      const file = e.target.files[0];
      this.path = file;

      console.log(this.path);
    },

    OnUpdate(id) {
     
      this.$inertia
        .post("/dashboard/tags/update/" + id, this.fields)
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