<template>
        <a :href="link" class="btn btn-tag btn-tag-light btn-tag-rounded mx-1" v-if="link">          
          <i :class="'mr-2 fa fa-' + icon" v-if="icon"></i> <slot></slot>
        </a>

        <button type="button" class="btn btn-tag btn-tag-light btn-tag-rounded mx-1" v-else>
          <i :class="'mr-2 fa fa-' + icon" v-if="icon"></i> <slot></slot>
        </button>

</template>

<script>
	export default {
          props: {

          	icon: {

          		default: null
          	},

          	link: {

          		default: null
          	}
          }
        }
</script>