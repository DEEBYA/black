<template> 
	<div>
		<input type="hidden" id="trix" :name="name">
		<trix-editor input="trix"></trix-editor>
	</div>
</template>

<script>
	import Trix from 'trix';

	export default{
		props: ['name']
	}
</script>