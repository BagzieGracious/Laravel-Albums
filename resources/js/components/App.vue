<template>
	<div>
		<Comments :asset="data" :auth="auth" />
	</div>
</template>

<script>
	import Comments from './Comments'
	export default{
		name: 'App',
		props: ['data', 'auth'],
		components: { Comments },
	}	
</script>
