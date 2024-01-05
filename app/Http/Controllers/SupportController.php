<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Response;

class SupportController extends Controller
{
    //

    public function getTicketForm(){

    	return view('wellknown.frontend.support');
    }

    public function postTicketForm(Request $request){
    	 $request->validate([

         'name'     => 'required',
         'email'    => 'required',
         'subject'  => 'required',
         'message'  => 'required',
         'file'     => 'required'

    	 ]);
    	 //$input=$request->all();
    	// dd($input);


        $message = $request->message;
        $dom = new \DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $message = $dom->saveHTML();

    	  $path = '';
        if($request->hasFile('file') ) {
        $file = $request->file('file');
        // Get the Image Name
        $fileName =time()."-".$file->getClientOriginalName();
        // Set the Filepath
        $path = $fileName;
        // Move the file to the upload Folder
        $file = $file->move('frontend/images/ticket', $fileName);


    }

    $ticket          = new Ticket;
    $ticket->name    = $request->name;
    $ticket->email   = $request->email;
    $ticket->subject = $request->subject;
    $ticket->message = $message;
    $ticket->file    = $path;

    $ticket->save();

    return redirect()->back()->with('message','Submit Successfully');

}

public function adminTicket(){
	$ticket = Ticket::paginate(10);

	return view('pages.tables.ticket',compact('ticket'));
}

public function fileDownload($id){
	    //dd($id);
	    $ticket=Ticket::find($id);
        $filename=$ticket->file;
        $path= 'frontend/images/ticket/'.$filename;
        // dd($path);
        return Response::download($path);
}

public function adminTicketRemove($id){
    $ticket=Ticket::find($id);
    $ticket->delete();
    return redirect()->back()->with('error','Ticket Remove');
}


}
