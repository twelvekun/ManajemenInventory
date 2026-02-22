<?php

namespace App\Helpers;

class PermissionHelper
{
    /**
     * Check if user is admin
     */
    public static function isAdmin(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    /**
     * Check if user is regular user (karyawan)
     */
    public static function isUser(): bool
    {
        return auth()->check() && auth()->user()->hasRole('user');
    }

    /**
     * Check if user can access predictions
     */
    public static function canViewPredictions(): bool
    {
        return auth()->check() && auth()->user()->can('view-predictions');
    }

    /**
     * Check if user can access overall data
     */
    public static function canViewOverallData(): bool
    {
        return auth()->check() && auth()->user()->can('view-overall-data');
    }

    /**
     * Get user role name
     */
    public static function getUserRole(): string
    {
        if (!auth()->check()) {
            return 'guest';
        }

        return auth()->user()->getRoleNames()->first() ?? 'unknown';
    }

    /**
     * Get all user permissions
     */
    public static function getUserPermissions(): array
    {
        if (!auth()->check()) {
            return [];
        }

        return auth()->user()->getAllPermissions()->pluck('name')->toArray();
    }
}
