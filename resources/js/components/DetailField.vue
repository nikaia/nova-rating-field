<template>
    <panel-item :field="field">
        <template slot="value">
            <star-rating
                    :read-only="true"

                    :id="field.name"
                    :name="field.name"
                    :rating="parseFloat(value) || 0"
                    :increment="increment"
                    :max-rating="max"
                    :show-rating="showRating"

                    :star-size="field['star-size']"
                    :inactive-color="field['inactive-color']"
                    :active-color="field['active-color']"
                    :border-color="field['border-color']"
                    :border-width="field['border-width']"
                    :padding="field['padding']"
                    :rounded-corners="field['rounded-corners']"
                    :inline="field['inline']"
                    :glow="field['glow']"
                    :glow-color="field['glow-color']"
                    :text-class="field['text-class']"
            />
        </template>
    </panel-item>
</template>

<script>
    import StarRating from 'vue-star-rating'

    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],

        components: { StarRating },

        data: () => ({
            value: 0,
        }),

        mounted() {
            this.value = parseFloat(this.field.value) || 0
        },

        computed: {
            increment() {
                return parseFloat(this.field.increment);
            },
            max() {
                return parseInt(this.field.max);
            },
            min() {
                return parseFloat(this.field.min);
            },
            max() {
                return parseInt(this.field.max);
            },
            showRating() {
                return !!this.field.showRating;
            }
        },


        methods: {}
    }
</script>
