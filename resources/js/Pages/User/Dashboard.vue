<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <h1 class="text-2xl font-bold text-blue-600">Mini Réseau Social</h1>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="#" class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Accueil
                            </a>
                            <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Groupes
                            </a>
                            <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Messages
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <span class="text-xl">🔔</span>
                        </button>
                        <div class="ml-4 relative">
                            <div class="relative" ref="userMenuRef">
                                <button @click="toggleUserMenu"
                                        class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                    <img :src="user.avatar || 'https://ui-avatars.com/api/?name=' + user.name"
                                         class="h-8 w-8 rounded-full"
                                         :alt="user.name">
                                    <span>{{ user.name }}</span>
                                </button>

                                <!-- Menu déroulant -->
                                <div v-show="showUserMenu"
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                    <a href="/profile"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Mon Profil
                                    </a>
                                    <form @submit.prevent="logout" class="block">
                                        <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                            Déconnexion
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Sidebar -->
                <div class="hidden md:block">
                    <div class="bg-white rounded-lg shadow p-4 mb-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <img :src="user.avatar || 'https://ui-avatars.com/api/?name=' + user.name"
                                 class="h-16 w-16 rounded-full"
                                 :alt="user.name">
                            <div>
                                <h2 class="text-lg font-semibold">{{ user.name }}</h2>
                                <p class="text-gray-500 text-sm">{{ user.email }}</p>
                            </div>
                        </div>
                        <div class="border-t pt-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500">Amis</span>
                                <span class="font-semibold">248</span>
                            </div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500">Groupes</span>
                                <span class="font-semibold">12</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Publications</span>
                                <span class="font-semibold">56</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold mb-4">Groupes suggérés</h3>
                        <div class="space-y-4">
                            <div v-for="group in suggestedGroups" :key="group.id" class="flex items-center space-x-3">
                                <div class="text-2xl">{{ group.icon }}</div>
                                <div>
                                    <h4 class="font-medium">{{ group.name }}</h4>
                                    <p class="text-sm text-gray-500">{{ group.members }} membres</p>
                                </div>
                                <button class="ml-auto bg-blue-500 text-white px-3 py-1 rounded-full text-sm hover:bg-blue-600">
                                    Rejoindre
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Feed -->
                <div class="md:col-span-2">
                    <!-- Create Post -->
                    <div class="bg-white rounded-lg shadow p-4 mb-6">
                        <div class="flex space-x-4">
                            <img :src="user.avatar || 'https://ui-avatars.com/api/?name=' + user.name"
                                 class="h-10 w-10 rounded-full"
                                 :alt="user.name">
                            <div class="flex-1">
                                <textarea
                                    class="w-full border-0 focus:ring-0 resize-none"
                                    rows="2"
                                    placeholder="Quoi de neuf ?"
                                ></textarea>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="flex space-x-2">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <span class="text-xl">📷</span>
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <span class="text-xl">🎥</span>
                                        </button>
                                    </div>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                                        Publier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Posts Feed -->
                    <div class="space-y-6">
                        <div v-for="post in posts" :key="post.id" class="bg-white rounded-lg shadow">
                            <div class="p-4">
                                <div class="flex items-center space-x-3 mb-4">
                                    <img :src="post.user.avatar || 'https://ui-avatars.com/api/?name=' + post.user.name"
                                         class="h-10 w-10 rounded-full"
                                         :alt="post.user.name">
                                    <div>
                                        <h3 class="font-semibold">{{ post.user.name }}</h3>
                                        <p class="text-sm text-gray-500">{{ post.time }}</p>
                                    </div>
                                </div>
                                <p class="mb-4">{{ post.content }}</p>
                                <img v-if="post.image" :src="post.image" class="rounded-lg mb-4" :alt="post.content">
                                <div class="flex items-center space-x-4 text-gray-500">
                                    <button @click="toggleLike(post)"
                                            class="flex items-center space-x-1 hover:text-blue-500"
                                            :class="{ 'text-blue-500': post.liked }">
                                        <span>👍</span>
                                        <span>{{ post.likes }}</span>
                                    </button>
                                    <button class="flex items-center space-x-1 hover:text-blue-500">
                                        <span>💬</span>
                                        <span>{{ post.comments }}</span>
                                    </button>
                                    <button class="flex items-center space-x-1 hover:text-blue-500">
                                        <span>🔄</span>
                                        <span>Partager</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';

const user = ref({
    name: 'John Doe',
    email: 'john@example.com',
    avatar: null
});

const suggestedGroups = ref([
    { id: 1, name: 'Tech Enthusiasts', icon: '💻', members: 1234 },
    { id: 2, name: 'Photography Club', icon: '📸', members: 856 },
    { id: 3, name: 'Book Lovers', icon: '📚', members: 2345 }
]);

const posts = ref([
    {
        id: 1,
        user: {
            name: 'Jane Smith',
            avatar: null
        },
        content: 'Just finished reading an amazing book! 📚',
        time: 'Il y a 2 heures',
        likes: 24,
        comments: 5,
        image: null
    },
    {
        id: 2,
        user: {
            name: 'Mike Johnson',
            avatar: null
        },
        content: 'Beautiful sunset at the beach today! 🌅',
        time: 'Il y a 4 heures',
        likes: 42,
        comments: 8,
        image: 'https://source.unsplash.com/random/800x600/?sunset'
    }
]);

const showUserMenu = ref(false);
const userMenuRef = ref(null);

const toggleUserMenu = () => {
    showUserMenu.value = !showUserMenu.value;
};

const handleClickOutside = (event) => {
    if (userMenuRef.value && !userMenuRef.value.contains(event.target)) {
        showUserMenu.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

const toggleLike = async (post) => {
    try {
        const response = await fetch(`/posts/${post.id}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            post.likes = data.likes_count;
            post.liked = data.liked;
        }
    } catch (error) {
        console.error('Erreur lors du like:', error);
    }
};

const logout = () => {
    router.post('/logout', {}, {
        onSuccess: () => {
            window.location.href = '/';
        }
    });
};
</script>

<style scoped>
/* Styles spécifiques si nécessaire */
</style>
