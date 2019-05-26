<template>
  <li class="list-item column is-one-third">
    <div class="card" @click="goToPublication">
      <div class="card-image">
        <figure class="image is-4by3">
          <img :src="publication.urlCover" :alt="publication.title">
        </figure>
      </div>
      <div class="card-content">
        <div class="media">
          <div class="media-content">
            <p class="title is-5">{{publication.title}}</p>
            <p class="sub-title">{{creation_date}}</p>
          </div>
        </div>
        <div class="content">
          {{publication.content.slice(0, 100)}}
          <br>
          <a :href="url">Leer más</a>
        </div>
      </div>
    </div>
  </li>
</template>

<script>
import moment from "moment";
export default {
  name: "publication-list-item",
  props: {
    publication: {
      type: Object,
      required: true
    }
  },
  computed: {
    creation_date() {
      return moment(this.publication.creation_date).format("YYYY/MM/DD");
    },
    toHyphens() {
      return this.publication.title.replace(" ", "-").toLowerCase();
    },
    url() {
      return `/${this.creation_date}/${this.toHyphens}`;
    }
  },
  methods: {
    goToPublication() {
      alert("Clicked the publication");
      // this.$router.go({ name: this.url });
      // window.location(this.url);
    }
  }
};
</script>

<style>
</style>
