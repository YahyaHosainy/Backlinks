<template>
  <section class="py-5 mb-5">
    <!-- <page-header /> -->

    <div v-if="isReady" class="mt-5">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3">
        <h1 class="font-serif">WebSeo</h1>
        <p class="lead text-secondary">Keep yourself updated</p>

        <main role="main" class="mt-5">
          <div>
            <h4 class="my-4 border-bottom mt-5 pb-2">
              <span class="border-bottom border-dark pb-2">Tags</span>
            </h4>

            <div v-if="tags.length > 0">
              <div class="row row-cols-1 row-cols-md-3 row-cols-sm-2">
                <div :key="tag.id" v-for="tag in tags">
                  <router-link
                    :to="{ name: 'show-tag', params: { slug: tag.slug } }"
                    class="text-decoration-none"
                  >
                    <div class="col mb-4">
                      <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                          <p class="card-text">{{ tag.name }}</p>
                        </div>
                      </div>
                    </div>
                  </router-link>
                </div>
              </div>
            </div>

            <div v-else class="my-5">
              <p class="lead text-center text-muted mt-5">You have no tags</p>
              <p class="lead text-center text-muted mt-1">
                Write on the go with our mobile-ready app!
              </p>
            </div>
          </div>
        </main>
      </div>
      <!-- <page-footer /> -->
    </div>
  </section>
</template>

<script>
import NProgress from "nprogress";
import PageHeader from "../components/PageHeaderComponent";
import PageFooter from "../components/PageFooterComponent";

export default {
  name: "all-tags",

  components: {
    PageHeader,
    PageFooter,
  },

  metaInfo() {
    return {
      title: "Tags | webSeo",
      meta: [
        {
          rel: "“canonical”",
          href: "https://backlinks.services/blog",
        },
      ],
    };
  },

  data() {
    return {
      tags: [],
      isReady: false,
    };
  },

  async created() {
    await Promise.all([this.fetchTags()]);
    this.isReady = true;
    NProgress.done();
  },

  methods: {
    fetchTags() {
      return this.request()
        .get("/api/tags")
        .then(({ data }) => {
          this.tags = data;
          NProgress.inc();
        })
        .catch(() => {
          NProgress.done();
        });
    },
  },
};
</script>
