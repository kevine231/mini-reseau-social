<template>
    <div class="container mt-5">
        <div v-if="step === 1">
            <h3>Étape 1 : Informations personnelles</h3>
            <input v-model="form.name" placeholder="Nom complet" class="form-control mb-2" />
            <input v-model="form.email" placeholder="Email" type="email" class="form-control mb-2" />
            <input v-model="form.password" placeholder="Mot de passe" type="password" class="form-control mb-2" />
            <button @click="nextStep" class="btn btn-primary">Suivant</button>
        </div>

        <div v-if="step === 2">
            <h3>Étape 2 : Affinités</h3>
            <input v-model="form.interests" placeholder="Centres d'intérêt" class="form-control mb-2" />
            <button @click="prevStep" class="btn btn-secondary">Retour</button>
            <button @click="nextStep" class="btn btn-primary">Suivant</button>
        </div>

        <div v-if="step === 3">
            <h3>Étape 3 : Groupes</h3>
            <input v-model="form.group" placeholder="Nom du groupe" class="form-control mb-2" />
            <button @click="prevStep" class="btn btn-secondary">Retour</button>
            <button @click="nextStep" class="btn btn-primary">Suivant</button>
        </div>

        <div v-if="step === 4">
            <h3>Étape 4 : Confirmation</h3>
            <pre>{{ form }}</pre>
            <button @click="prevStep" class="btn btn-secondary">Retour</button>
            <button @click="submit" class="btn btn-success">S'inscrire</button>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import axios from 'axios';

const step = ref(1);
const form = reactive({
    name: '',
    email: '',
    password: '',
    interests: '',
    group: '',
});

const nextStep = () => {
    step.value++;
};
const prevStep = () => {
    step.value--;
};

const submit = async () => {
    try {
        await axios.post('/api/register', form);
        alert('Inscription réussie !');
        window.location.href = '/dashboard';
    } catch (error) {
        alert("Erreur lors de l'inscription");
        console.error(error);
    }
};
</script>

<style scoped>
input {
    width: 100%;
}
</style>
