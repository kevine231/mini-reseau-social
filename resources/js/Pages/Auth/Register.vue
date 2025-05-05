<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-2xl">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Créer votre compte
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Rejoignez notre communauté en quelques étapes simples
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex justify-between mb-2">
                        <div v-for="(step, index) in steps" :key="index" 
                             class="flex flex-col items-center">
                            <div :class="[
                                'w-8 h-8 rounded-full flex items-center justify-center',
                                currentStep >= index ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600'
                            ]">
                                {{ index + 1 }}
                            </div>
                            <span class="text-xs mt-1" :class="currentStep >= index ? 'text-blue-600' : 'text-gray-500'">
                                {{ step.title }}
                            </span>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute top-0 left-0 h-1 bg-gray-200 w-full"></div>
                        <div class="absolute top-0 left-0 h-1 bg-blue-600 transition-all duration-300"
                             :style="{ width: `${(currentStep / (steps.length - 1)) * 100}%` }">
                        </div>
                    </div>
                </div>

                <!-- Step Content -->
                <div class="mt-6">
                    <!-- Step 1: Personal Information -->
                    <div v-if="currentStep === 0">
                        <div class="space-y-6">
                            <div class="flex items-center justify-center">
                                <div class="relative">
                                    <img v-if="form.photo" :src="form.photo" 
                                         class="w-32 h-32 rounded-full object-cover border-4 border-blue-100">
                                    <div v-else 
                                         class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-4xl">👤</span>
                                    </div>
                                    <input type="file" 
                                           @change="handlePhotoUpload" 
                                           class="hidden" 
                                           ref="photoInput" 
                                           accept="image/*">
                                    <button @click="$refs.photoInput.click()" 
                                            class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                                        📷
                                    </button>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Prénom</label>
                                    <input type="text" v-model="form.firstName" 
                                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" v-model="form.lastName" 
                                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" v-model="form.email" 
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                <input type="password" v-model="form.password" 
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Interests -->
                    <div v-if="currentStep === 1">
                        <div class="space-y-6">
                            <h3 class="text-lg font-medium text-gray-900">Sélectionnez vos centres d'intérêt</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div v-for="interest in interests" :key="interest.id" 
                                     class="relative">
                                    <input type="checkbox" 
                                           :id="interest.id" 
                                           v-model="form.interests" 
                                           :value="interest.id" 
                                           class="hidden">
                                    <label :for="interest.id" 
                                           class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50"
                                           :class="form.interests.includes(interest.id) ? 'border-blue-500 bg-blue-50' : 'border-gray-300'">
                                        <span class="text-2xl mr-3">{{ interest.icon }}</span>
                                        <span>{{ interest.name }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Groups -->
                    <div v-if="currentStep === 2">
                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-900">Gestion des groupes</h3>
                                <button @click="showCreateGroupModal = true" 
                                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                    Créer un groupe
                                </button>
                            </div>

                            <div class="space-y-4">
                                <div v-for="group in groups" :key="group.id" 
                                     class="flex items-center justify-between p-4 border rounded-lg">
                                    <div class="flex items-center">
                                        <span class="text-2xl mr-3">{{ group.icon }}</span>
                                        <div>
                                            <h4 class="font-medium">{{ group.name }}</h4>
                                            <p class="text-sm text-gray-500">{{ group.members }} membres</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button @click="editGroup(group)" 
                                                class="text-blue-600 hover:text-blue-700">
                                            ✏️
                                        </button>
                                        <button @click="deleteGroup(group)" 
                                                class="text-red-600 hover:text-red-700">
                                            🗑️
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div v-if="currentStep === 3">
                        <div class="space-y-6">
                            <div class="text-center">
                                <span class="text-6xl">🎉</span>
                                <h3 class="mt-4 text-lg font-medium text-gray-900">Presque terminé !</h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Vérifiez vos informations avant de finaliser votre inscription
                                </p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-medium mb-4">Récapitulatif</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Nom complet</span>
                                        <span>{{ form.firstName }} {{ form.lastName }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Email</span>
                                        <span>{{ form.email }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Centres d'intérêt</span>
                                        <span>{{ selectedInterestsCount }} sélectionnés</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Groupes</span>
                                        <span>{{ groups.length }} créés</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="mt-8 flex justify-between">
                    <button v-if="currentStep > 0" 
                            @click="previousStep" 
                            class="bg-white text-gray-700 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                        Précédent
                    </button>
                    <button v-if="currentStep < steps.length - 1" 
                            @click="nextStep" 
                            class="ml-auto bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Suivant
                    </button>
                    <button v-else 
                            @click="submitForm" 
                            class="ml-auto bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                        Finaliser l'inscription
                    </button>
                </div>
            </div>
        </div>

        <!-- Create Group Modal -->
        <div v-if="showCreateGroupModal" 
             class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 max-w-md w-full">
                <h3 class="text-lg font-medium mb-4">Créer un nouveau groupe</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nom du groupe</label>
                        <input type="text" v-model="newGroup.name" 
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="newGroup.description" 
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="showCreateGroupModal = false" 
                            class="bg-white text-gray-700 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                        Annuler
                    </button>
                    <button @click="createGroup" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Créer
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useForm } from '@inertiajs/vue3'

const currentStep = ref(0)
const showCreateGroupModal = ref(false)

const steps = [
    { title: 'Informations' },
    { title: 'Intérêts' },
    { title: 'Groupes' },
    { title: 'Confirmation' }
]

const form = useForm({
    firstName: '',
    lastName: '',
    email: '',
    password: '',
    password_confirmation: '',
    photo: null,
    interests: [],
    groups: []
})

const interests = [
    { id: 1, name: 'Technologie', icon: '💻' },
    { id: 2, name: 'Sport', icon: '⚽' },
    { id: 3, name: 'Musique', icon: '🎵' },
    { id: 4, name: 'Art', icon: '🎨' },
    { id: 5, name: 'Voyage', icon: '✈️' },
    { id: 6, name: 'Cuisine', icon: '🍳' },
    { id: 7, name: 'Lecture', icon: '📚' },
    { id: 8, name: 'Photographie', icon: '📸' },
]

const groups = ref([])
const newGroup = ref({
    name: '',
    description: '',
    icon: '👥'
})

const selectedInterestsCount = computed(() => form.interests.length)

const handlePhotoUpload = (event) => {
    const file = event.target.files[0]
    if (file) {
        form.photo = file
        const reader = new FileReader()
        reader.onload = (e) => {
            form.photoPreview = e.target.result
        }
        reader.readAsDataURL(file)
    }
}

const validateStep = () => {
    switch (currentStep.value) {
        case 0:
            if (!form.firstName || !form.lastName || !form.email || !form.password) {
                alert('Veuillez remplir tous les champs obligatoires')
                return false
            }
            if (!form.email.includes('@')) {
                alert('Veuillez entrer une adresse email valide')
                return false
            }
            if (form.password.length < 8) {
                alert('Le mot de passe doit contenir au moins 8 caractères')
                return false
            }
            break
        case 1:
            if (form.interests.length === 0) {
                alert('Veuillez sélectionner au moins un centre d\'intérêt')
                return false
            }
            break
    }
    return true
}

const nextStep = () => {
    if (validateStep() && currentStep.value < steps.length - 1) {
        currentStep.value++
    }
}

const previousStep = () => {
    if (currentStep.value > 0) {
        currentStep.value--
    }
}

const createGroup = () => {
    if (!newGroup.value.name) {
        alert('Veuillez entrer un nom pour le groupe')
        return
    }

    const group = {
        id: Date.now(),
        name: newGroup.value.name,
        description: newGroup.value.description,
        icon: newGroup.value.icon,
        members: 1
    }

    groups.value.push(group)
    form.groups.push({
        name: group.name,
        description: group.description
    })

    showCreateGroupModal.value = false
    newGroup.value = { name: '', description: '', icon: '👥' }
}

const editGroup = (group) => {
    // Implémenter la logique d'édition
}

const deleteGroup = (group) => {
    groups.value = groups.value.filter(g => g.id !== group.id)
    form.groups = form.groups.filter(g => g.name !== group.name)
}

const submitForm = () => {
    if (!validateStep()) return

    form.post(route('register'), {
        onSuccess: () => {
            // Redirection gérée par le contrôleur
        },
        onError: (errors) => {
            alert('Une erreur est survenue lors de l\'inscription')
            console.error(errors)
        }
    })
}
</script>

<style scoped>
/* Styles spécifiques si nécessaire */
</style>
