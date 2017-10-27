<template>
	<div class="card card-default no-padding">
		<div class="d-flex my-2" :class="justify" >
		  <slot></slot>
		</div>
	</div>
</template>

<script>
	export default {

		props: {

			justify: {

				default: 'justify-content-origin'
			}
		}
	}
</script>