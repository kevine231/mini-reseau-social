<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-800 to-blue-900 text-white">
        <!-- Navigation -->
        <nav class="absolute top-0 left-0 right-0 z-50 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold">Mini Réseau Social</div>
                <div class="space-x-4">
                    <a href="/" class="btn btn-outline-light hover:bg-white hover:text-blue-900 transition duration-300">Accueil</a>
                    <a href="/about" class="btn btn-outline-light hover:bg-white hover:text-blue-900 transition duration-300">À propos</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container mx-auto px-4 pt-32 pb-20">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
                    Contactez-nous
                </h1>
                <p class="text-xl md:text-2xl mb-12 text-blue-100 animate-fade-in-delay">
                    Nous sommes là pour vous aider et répondre à vos questions
                </p>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="container mx-auto px-4 py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Contact Form -->
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 animate-fade-in">
                    <h2 class="text-2xl font-bold mb-6">Envoyez-nous un message</h2>
                    <form @submit.prevent="submitForm" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Nom</label>
                            <input
                                type="text"
                                v-model="form.name"
                                class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-10 border border-white border-opacity-20 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input
                                type="email"
                                v-model="form.email"
                                class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-10 border border-white border-opacity-20 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Message</label>
                            <textarea
                                v-model="form.message"
                                rows="5"
                                class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-10 border border-white border-opacity-20 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            class="w-full bg-white text-blue-900 py-3 rounded-lg font-medium hover:bg-blue-100 transition duration-300"
                            :disabled="form.processing"
                        >
                            Envoyer le message
                        </button>
                    </form>
                </div>

                <!-- Contact Info & Map -->
                <div class="space-y-8 animate-fade-in-delay">
                    <!-- Contact Info -->
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8">
                        <h2 class="text-2xl font-bold mb-6">Informations de contact</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">📍</div>
                                <div>
                                    <h3 class="font-medium">Adresse</h3>
                                    <p class="text-blue-100">EAFC de Uccle, Bruxelles</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">📧</div>
                                <div>
                                    <h3 class="font-medium">Email</h3>
                                    <p class="text-blue-100">contact@minireseausocial.be</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">📱</div>
                                <div>
                                    <h3 class="font-medium">Téléphone</h3>
                                    <p class="text-blue-100">+32 2 XXX XX XX</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8">
                        <h2 class="text-2xl font-bold mb-6">Notre emplacement</h2>
                        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2520.1234567890123!2d4.3456789!3d50.7890123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDQ3JzIwLjQiTiA0wrAyMCc0NC40IkU!5e0!3m2!1sfr!2sbe!4v1234567890"
                                width="100%"
                                height="300"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                class="rounded-lg"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-black bg-opacity-30 py-8">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p class="text-blue-100">&copy; 2024 Mini Réseau Social. Tous droits réservés.</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="/privacy" class="text-blue-100 hover:text-white transition duration-300">Confidentialité</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    message: ''
});

function submitForm() {
    form.post(route('contact.submit'), {
        onSuccess: () => {
            form.reset();
            alert('Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.');
        },
        onError: () => {
            alert('Une erreur est survenue. Veuillez réessayer.');
        }
    });
}
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-delay {
    animation: fadeIn 1s ease-out 0.3s both;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.btn {
    @apply inline-block px-6 py-2 rounded-full font-medium transition-all duration-300;
}

.btn-outline-light {
    @apply border-2 border-white text-white hover:bg-white hover:text-blue-900;
}
</style>
