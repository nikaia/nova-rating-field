<template>
    <default-field :field="field">
        <template slot="field">
            <star-rating
                    :read-only="false"
                    @rating-selected="setRating"

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

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'
    import StarRating from 'vue-star-rating'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

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


        methods: {

            setRating(rating) {
                this.value = parseFloat(rating);
                console.log(rating, this.value)
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || 0)
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value
            }
        }
    }
</script>
