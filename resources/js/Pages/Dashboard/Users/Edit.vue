<template>
  <dashboard title="Edit job" :user="user">
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
        Update Job
      </h2>
      <div class="container w-9/12 mx-auto px-4 mb-12 mt-8">
        <form @submit.prevent="OnUpdate(job.id)">
          <div class="sm:w-3/4 mx-auto">
            <div>
              <div class="mb-4">
                <label for="job title" class="uppercase">job title</label>
                <input
                  type="name"
                  v-model="fields.job_title"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
                <span class="text-second-gray text-sm"
                  >Example: Senior Laravel Developer</span
                >
              </div>

              <div class="mb-4">
                <label for="job location" class="uppercase">job location</label>
                <input
                  type="text"
                  v-model="fields.job_location"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
                <span class="text-second-gray text-sm"
                  >Example: “Remote”, “Remote, Khartoum Only”, “Khartoum”</span
                >
              </div>

              <div class="mb-4">
                <label for="tags" class="uppercase">tags</label>
                <multiselect
                  v-model="tag"
                  tag-placeholder="Add this as new tag"
                  class="px-3 py-1 rounded-lg bg-gray-200 w-full"
                  placeholder="Search or add a tag"
                  label="name"
                  track-by="code"
                  :options="options"
                  :multiple="true"
                  @tag="addTag"
                  :max="4"
                ></multiselect>
                <span class="text-second-gray text-sm">Max of Four Tags</span>
              </div>

              <div class="mb-4">
                <label for="company Name" class="uppercase">company Name</label>
                <input
                  type="text"
                  v-model="fields.company_name"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
              </div>

              <div class="mb-4">
                <label for="job description" class="uppercase"
                  >job description</label
                >
                <ckeditor
                  v-model="fields.job_description"
                  :config="editorConfig"
                ></ckeditor>
              </div>

              <div class="mb-4">
                <label for="job responsibilities" class="uppercase"
                  >job responsibilities</label
                >
                <span class="text-primary ml-3 text-xs">(optional)</span>
                <ckeditor
                  v-model="fields.job_responsibilities"
                  :config="editorConfig"
                ></ckeditor>
              </div>

              <div class="mb-4">
                <label for="job requirements" class="uppercase"
                  >job requirements</label
                >
                <span class="text-primary ml-3 text-xs">(optional)</span>
                <ckeditor
                  :config="editorConfig"
                  v-model="fields.job_requirements"
                ></ckeditor>
              </div>

              <div class="mb-4">
                <label
                  for="apply url"
                  class="uppercase"
                  :class="{ 'text-gray-300': focusedEmail }"
                  >apply url</label
                >
                <input
                  type="text"
                  v-model="fields.apply_url"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                  :class="[focusedEmail ? 'bg-gray-100' : 'bg-gray-200']"
                  @focus="focusUrl"
                  @blur="blurUrl"
                />
              </div>

              <span class="flex justify-center text-second-gray text-sm"
                >OR</span
              >

              <div class="mb-4">
                <label
                  for="apply email"
                  class="uppercase"
                  :class="{ 'text-gray-300': focusedUrl }"
                  >apply email</label
                >
                <input
                  type="text"
                  v-model="fields.apply_email"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                  :class="[focusedUrl ? 'bg-gray-100' : 'bg-gray-200']"
                  @focus="focusEmail"
                  @blur="blurEmail"
                />
                <span
                  class="text-sm"
                  :class="[focusedUrl ? 'text-gray-300' : 'text-second-gray']"
                >
                  This email is public, the Apply button links to it if you do
                  not supply an Apply URL above
                </span>
              </div>

              <div class="mb-4">
                <label for="company Logo" class="uppercase">company Logo</label>
                <span class="text-primary ml-3 text-xs">(optional)</span>
                <input
                  type="file"
                  @change="onInputChange"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
              </div>

              <div class="mb-4">
                <div class="block">
                  <label for="color" class="uppercase">color</label>
                  <span class="text-primary ml-3 text-xs">(optional)</span>
                </div>
                <div class="flex flex-col">
                  <div v-for="(color, index) in colors" :key="index">
                    <input
                      type="radio"
                      :id="'color' + index"
                      :value="color.name"
                      v-model="fields.job_color"
                      :checked="fields.job_color == color.name"
                      :class="'ml-2 form-radio ' + color.text"
                    />
                    <label
                      :for="'color' + index"
                      :class="'font-bold text-sm ' + color.name"
                    >
                      {{ color.label }}
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-4">
              <div class="block">
                <label for="status" class="uppercase">
                  Check only if Job is Available</label
                >
                <input
                  type="checkbox"
                  id="status"
                  class="form-checkbox text-gray-800"
                  @change="checked"
                  :checked="fields.status == 1"
                />
                Status
              </div>
            </div>
            <div class="flex justify-center mt-10">
              <button
                type="submit"
                class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none"
              >
                Post Job
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
  props: ["user", "tags", "errors", "job"],

  data() {
    return {
      fields: this.job,
      path: "",
      tag: [],
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
      options: this.job.tags,
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
      const formData = new FormData();
      formData.append("logo", this.path);
      formData.append("tags", this.tags);

      _.each(this.fields, (value, key) => {
        formData.append(key, value);
      });
      this.$inertia
        .post("/dashboard/jobs/update/" + id, formData)
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