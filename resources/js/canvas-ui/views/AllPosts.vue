<template>
  <div>
    <section class="py-5 mb-5">
      <!-- <page-header /> -->
      <div class="home-banner-two-auth">
        <div class="d-table">
          <div class="d-table-cell">
            <div class="container">
              <div v-if="isReady" class="mt-5">
                <div
                  class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3"
                >
                  <main role="main" class="mt-5">
                    <div>
                      <div class="my-4 border-bottom mt-5 pb-2">
                        <h1 class="border-bottom border-dark pb-2">
                          SEO Backlinks Blog Posts
                        </h1>
                        <p>
                          Our SEO Backlinks Blog Posts contains a lot of
                          valuable information about backlinking, don't miss
                          reading them!
                        </p>
                      </div>

                      <div
                        :key="`${index}-${post.id}`"
                        v-for="(post, index) in posts"
                      >
                        <router-link
                          :to="{
                            name: 'show-post',
                            params: { slug: post.slug },
                          }"
                          class="text-decoration-none"
                        >
                          <div class="card mb-4 shadow">
                            <div class="card-body px-0">
                              <div
                                class="container d-lg-inline-flex align-items-center"
                              >
                                <div
                                  v-if="post.featured_image"
                                  class="col-12 col-lg-3 p-0"
                                >
                                  <img
                                    :src="post.featured_image"
                                    :alt="post.featured_image_caption"
                                    class="rounded w-100"
                                  />
                                </div>
                                <section
                                  class="col-12 mt-3 mt-lg-0 px-0 px-lg-3"
                                  :class="post.featured_image ? 'col-lg-9' : ''"
                                >
                                  <h2
                                    class="card-title text-truncate mb-0"
                                    style="font-size: 18px"
                                  >
                                    {{ post.title }}
                                  </h2>
                                  <p class="card-text ">
                                    {{ post.summary }}
                                  </p>
                                  <p class="card-text mb-0 text-secondary">
                                    {{ post.user.name }}
                                    <span v-if="post.topic.length">
                                      in {{ post.topic[0].name }}
                                    </span>
                                  </p>
                                  <p class="card-text text-secondary">
                                    {{
                                      moment(post.published_at).format(
                                        "MMM D, Y"
                                      )
                                    }}
                                    —
                                    {{ post.read_time }}
                                  </p>
                                </section>
                              </div>
                            </div>
                          </div>
                        </router-link>
                      </div>

                      <infinite-loading spinner="spiral" @infinite="fetchPosts">
                        <span slot="no-more" />
                        <div slot="no-results" class="text-left">
                          <div class="my-5">
                            <p class="lead text-center text-muted mt-5">
                              You have no published posts
                            </p>
                            <p class="lead text-center text-muted mt-1">
                              Write on the go with our mobile-ready app!
                            </p>
                          </div>
                        </div>
                      </infinite-loading>
                    </div>
                  </main>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-img-wrapper">
          <div class="banner-img-1">
            <img src="/assets/img/left-shape.png" alt="image" />
          </div>

          <div class="banner-img-2">
            <img src="/assets/img/right-shape.png" alt="image" />
          </div>
        </div>

        <div class="shape-img2">
          <img src="/assets/img/shape/2.png" alt="image" />
        </div>
        <div class="shape-img3">
          <img src="/assets/img/shape/3.png" alt="image" />
        </div>
        <div class="shape-img5">
          <img src="/assets/img/shape/5.png" alt="image" />
        </div>
        <div class="shape-img6">
          <img src="/assets/img/shape/6.png" alt="image" />
        </div>
        <div class="shape-img7">
          <img src="/assets/img/shape/2.png" alt="image" />
        </div>
        <div class="shape-img8">
          <img src="/assets/img/shape/10.png" alt="image" />
        </div>
        <div class="shape-img9">
          <img src="/assets/img/shape/7.png" alt="image" />
        </div>
        <div class="shape-img10">
          <img src="/assets/img/shape/5.png" alt="image" />
        </div>
        <div class="shape-img11">
          <img src="/assets/img/shape/11.png" alt="image" />
        </div>
      </div>
    </section>
    <!-- <page-footer /> -->
  </div>
</template>

<script>
import InfiniteLoading from "vue-infinite-loading";
import NProgress from "nprogress";
import PageHeader from "../components/PageHeaderComponent";
import PageFooter from "../components/PageFooterComponent";
import isEmpty from "lodash/isEmpty";

export default {
  name: "all-posts",

  components: {
    InfiniteLoading,
    PageHeader,
    PageFooter,
  },

  metaInfo() {
    return {
      title: "BackLinks Blog Posts | Backlinks Services",
      link: [
        {
          rel: "alternate",
          href: "https://backlinks.services/blog",
          hreflang: "en-US",
        },
        {
          rel: "canonical",
          href: "https://backlinks.services/blog",
        },
      ],
      meta: [
        {
          name: "description",
          content:
            "Our SEO Backlinks Blog Posts contains a lot of valuable information about backlinking, don't miss reading them!",
        },
        { property: "fb:app_id", content: "684180525600147" },
        { property: "og:type", content: "article" },
        { property: "og:title", content: "Our Blog | Backlinks Services" },
        { property: "og:url", content: "https://backlinks.services/blog" },
        {
          property: "og:image",
          content: "https://backlinks.services/assets/img/webseodirectlogo.png",
        },
        {
          property: "og:description",
          content:
            "Our SEO Backlinks Blog Posts contains a lot of valuable information about backlinking, don't miss reading them!",
        },
        { name: "twitter:card", content: "summary" },
        { name: "twitter:title", content: "Our Blog | Backlinks Services" },
        { name: "twitter:domain", content: "https://backlinks.services/blog" },
        {
          name: "twitter:image",
          content: "https://backlinks.services/assets/img/webseodirectlogo.png",
        },
        {
          name: "twitter:description",
          content:
            "Our SEO Backlinks Blog Posts contains a lot of valuable information about backlinking, don't miss reading them!",
        },
        { name: "twitter:creator", content: "@WebSEO_Direct" },
        { name: "twitter:site", content: "@WebSEO_Direct" },
      ],
    };
  },

  data() {
    return {
      page: 1,
      posts: [],
      isReady: false,
    };
  },

  async created() {
    await Promise.all([this.fetchPosts()]);
    this.isReady = true;
    NProgress.done();
  },

  methods: {
    fetchPosts($state) {
      if ($state) {
        return this.request()
          .get("/api/posts", {
            params: {
              page: this.page,
            },
          })
          .then(({ data }) => {
            if (!isEmpty(data) && !isEmpty(data.data)) {
              this.page += 1;
              this.posts.push(...data.data);

              $state.loaded();
            } else {
              $state.complete();
            }

            if (isEmpty($state)) {
              NProgress.inc();
            }
          })
          .catch(() => {
            NProgress.done();
          });
      }
    },
  },
};
</script>

