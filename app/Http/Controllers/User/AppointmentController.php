<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function showAvailableAppointments(Request $request)
{
    // جلب المواعيد المتاحة فقط
    $appointments = Appointment::where('lawyer_id', $request->lawyer_id)
                                ->where('status', 'pending')
                                ->orderBy('appointment_date', 'asc')
                                ->get();

    return view('user.book-appointment', compact('appointments'));
}

public function createAvailableSlots(Request $request)
{
    $request->validate([
        'appointment_date' => 'required|date|after:now',
        'appointment_time' => 'required|date_format:H:i', 
    ]);

    $lawyer = auth()->guard('lawyer')->user();

    $appointmentDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->appointment_date . ' ' . $request->appointment_time);

    Appointment::create([
        'lawyer_id' => $lawyer->id,
        'user_id' => null, 
        'appointment_date' => $appointmentDateTime,
        'status' => 'pending', 
    ]);

    return back()->with('success', 'Appointment slot added successfully!');
}

public function bookAppointment(Request $request)
{
    // Check if the user is authenticated as a lawyer and prevent booking
    if (auth()->guard('lawyer')->check()) {
        return redirect()->route('lawyer.profile')->with('error', 'Only normal users can book appointments.');
    }

    // Validate the request to ensure an appointment ID is provided and exists
    $request->validate([
        'appointment_id' => 'required|exists:appointments,id',
    ]);

    $user = auth()->guard('web')->user();
    $appointment = Appointment::findOrFail($request->appointment_id);

    // Check if the appointment is available for booking
    if ($appointment->status !== 'pending') {
        return back()->with('error', 'This appointment is no longer available.');
    }

    // Check if the user already has a booked appointment for the same time
    $conflictingAppointment = Appointment::where('user_id', $user->id)
        ->where('appointment_date', $appointment->appointment_date)
        ->where('status', 'confirmed')
        ->first();

    if ($conflictingAppointment) {
        return back()->with('error', 'You already have a booked appointment at this time.');
    }

    // Update the appointment to reflect booking
    $appointment->update([
        'user_id' => $user->id,
        'status' => 'confirmed',
    ]);

    return back()->with('success', 'Appointment booked successfully!');
}

public function cancelAppointment(Request $request, $id)
{
    // Find the appointment by ID or throw a 404 error if not found
    $appointment = Appointment::findOrFail($id);

    // Check if the current user is authenticated as a lawyer
    if (auth()->guard('lawyer')->check()) {
        // Update the appointment status to "canceled"
        $appointment->update([
            'status' => 'canceled',
        ]);

        // Return back with a success message
        return redirect()->back()->with('success', 'Appointment canceled successfully.');
    }

    // If the user is not authorized, return with an error message
    return redirect()->back()->with('error', 'You are not authorized to perform this action.');
}



}
