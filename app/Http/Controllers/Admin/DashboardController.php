<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fighter;          // key/camps fighters table
use App\Models\EhfFighter;       // ehf fighters table
use App\Models\Coach;            // coaches table (or TeamMember)
use App\Models\ChallengeRequest; // challenge requests table
use App\Models\ContactMessage;   // contact form messages table
use App\Models\Application;   // contact form messages table
use App\Models\CampFighterApplication;   // contact form messages table




class DashboardController extends Controller
{
public function index()
{
    // Fighters
    $totalKeyCampFighters = Fighter::count();
    $keyFighters  = Fighter::count(); // replace later with real filter if you have type column
    $ehfFighters  = EhfFighter::count();
    $totalFighters = $totalKeyCampFighters + $ehfFighters;

    // Coaches
    $coaches = Coach::count();

    // Challenges
    $challenges = ChallengeRequest::count();
    $pendingChallenges = ChallengeRequest::where('status', 'new')->count();

    // Contact messages
    $messages = ContactMessage::count();
    $unreadMessages = ContactMessage::where('is_read', 0)->count();

    // Applications
    $application = Application::count();
    $pendingApplications = Application::where('status', 'pending')->count();

    // Camp Applications
    $campapplication = CampFighterApplication::count();
    $pendingCampApplications = CampFighterApplication::where('status', 'pending')->count();

    return view('admin.dashboard', compact(
        'totalFighters',
        'keyFighters',
        'totalKeyCampFighters',
        'ehfFighters',
        'coaches',
        'challenges',
        'pendingChallenges',
        'messages',
        'unreadMessages',
        'application',
        'pendingApplications',
        'campapplication',
        'pendingCampApplications'
    ));
}


// DashboardController.php

public function notifCounts()
{
    $unreadMessages = \App\Models\ContactMessage::where('is_read', 0)->count();

    // If your status values are different, adjust here:
    $pendingChallenges = \App\Models\ChallengeRequest::where('status', 'new')->count();

    $pendingCampApps = \App\Models\CampFighterApplication::where('status', 'pending')->count();

    $pendingEhfApps = \App\Models\Application::where('status', 'pending')->count();

    return response()->json([
        'unread_messages' => $unreadMessages,
        'pending_challenges' => $pendingChallenges,
        'pending_camp_apps' => $pendingCampApps,
        'pending_ehf_apps' => $pendingEhfApps,
        'total' => $unreadMessages + $pendingChallenges + $pendingCampApps + $pendingEhfApps,
    ]);
}




}
