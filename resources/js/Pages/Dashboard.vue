<template>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-600">Admin Panel</h1>
                <p class="text-sm text-gray-500 mt-1">Gestion du réseau social</p>
            </div>
            <nav class="mt-4">
                <a href="/admin/dashboard" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <span class="mr-3">📊</span>
                    Dashboard
                </a>
                <a href="/admin/users" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <span class="mr-3">👥</span>
                    Utilisateurs
                </a>
                <a href="/admin/groups" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <span class="mr-3">👥</span>
                    Groupes
                </a>
                <a href="/admin/posts" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <span class="mr-3">📝</span>
                    Publications
                </a>
                <a href="/admin/reports" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <span class="mr-3">⚠️</span>
                    Signalements
                </a>
                <a href="/admin/settings" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <span class="mr-3">⚙️</span>
                    Paramètres
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">Tableau de bord</h2>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <span class="text-xl">🔔</span>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                <span class="text-xl">👤</span>
                                <span>Admin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <span class="text-2xl">👥</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Utilisateurs</p>
                                <p class="text-2xl font-semibold">1,245</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 text-sm">↑ 12% ce mois</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <span class="text-2xl">👥</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Groupes</p>
                                <p class="text-2xl font-semibold">312</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 text-sm">↑ 8% ce mois</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <span class="text-2xl">📝</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Publications</p>
                                <p class="text-2xl font-semibold">843</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 text-sm">↑ 23% ce mois</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <span class="text-2xl">⚠️</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Signalements</p>
                                <p class="text-2xl font-semibold">12</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-red-500 text-sm">↑ 3% ce mois</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold">Activité récente</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                    👤
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium">Nouvel utilisateur inscrit</p>
                                    <p class="text-xs text-gray-500">Jean Dupont - Il y a 5 minutes</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    📝
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium">Nouveau groupe créé</p>
                                    <p class="text-xs text-gray-500">Tech Group - Il y a 15 minutes</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                    ⚠️
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium">Nouveau signalement</p>
                                    <p class="text-xs text-gray-500">Publication inappropriée - Il y a 30 minutes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h4 class="text-lg font-semibold mb-4">Actions rapides</h4>
                        <div class="space-y-3">
                            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Ajouter un utilisateur
                            </button>
                            <button class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Créer un groupe
                            </button>
                            <button class="w-full bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                                Voir les signalements
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <h4 class="text-lg font-semibold mb-4">Statistiques</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span>Utilisateurs actifs</span>
                                <span class="font-semibold">789</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Publications aujourd'hui</span>
                                <span class="font-semibold">156</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Nouveaux groupes</span>
                                <span class="font-semibold">23</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <h4 class="text-lg font-semibold mb-4">Système</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span>Version</span>
                                <span class="font-semibold">1.0.0</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Dernière mise à jour</span>
                                <span class="font-semibold">Aujourd'hui</span>
                            </div>
                            <div class="flex justify-between">
                                <span>État du système</span>
                                <span class="font-semibold text-green-600">Opérationnel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
// Logique à implémenter
</script>

<style scoped>
/* Styles spécifiques si nécessaire */
</style>
