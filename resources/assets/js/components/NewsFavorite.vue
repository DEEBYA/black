<template>
    <button type="submit" :class="classes" @click="toggle">
         <span data-feather="thumbs-up"></span>
        <span v-text="count"></span>
    </button>
</template>

<script>
    export default {
        props: ['new'],
        data() {
            return {
                count: this.new.favoritesCount,
                active: this.new.isFavorited
            }
        },
        computed: {
            classes() {
                return [
                    'btn',
                    this.active ? 'btn btn-outline-success asd' : 'btn-default asd'
                ];
            },
            endpoint() {
                return '/news/' + this.new.id + '/favorites';
            }
        },
        methods: {
            toggle() {
                this.active ? this.destroy() : this.create();
            },
            create() {
                axios.post(this.endpoint);
                this.active = true;
                this.count++;
            },
            destroy() {
                axios.delete(this.endpoint);
                this.active = false;
                this.count--;
            }
        }
    }
</script>

<style>
    .asd{
    border-radius: 50%;
    width: 72px;
    height: 69px;
    }
</style>