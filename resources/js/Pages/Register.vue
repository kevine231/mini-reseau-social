<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h2>Créer un compte</h2>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    id="name"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.name }"
                                    required
                                />
                                <div class="invalid-feedback" v-if="errors.name">
                                    {{ errors.name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    id="email"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.email }"
                                    required
                                />
                                <div class="invalid-feedback" v-if="errors.email">
                                    {{ errors.email }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input
                                    v-model="form.password"
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.password }"
                                    required
                                />
                                <div class="invalid-feedback" v-if="errors.password">
                                    {{ errors.password }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input
                                    v-model="form.password_confirmation"
                                    type="password"
                                    id="password_confirmation"
                                    class="form-control"
                                    required
                                />
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                S'inscrire
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const errors = reactive({});

function submit() {
    errors.name = '';
    errors.email = '';
    errors.password = '';

    router.post('/register', form, {
        onError: (e) => {
            Object.assign(errors, e);
        },
    });
}
</script>

<style scoped>
h2 {
    color: #0d6efd;
}
</style>
