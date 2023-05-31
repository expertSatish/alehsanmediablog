<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Add Books</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Title<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
                        <div class="text-danger" id="title-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Editor</label>
                        <input type="text" class="form-control" placeholder="Enter Editor" name="editor" id="editor">
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label"></label>
                        <input type="text" class="form-control" placeholder="Enter Compilers" name="compilers" id="compilers">
                    </div>
                      <div class="col-sm-6">
                        <label class="label-control label">Assistants</label>
                        <input type="text" class="form-control" placeholder="Enter Assistants" name="assistants" id="assistants">
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Translator </label>
                        <input type="text" class="form-control" placeholder="Enter Translator" name="translator" id="translator">
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Research And Analysis</label>
                        <input type="text" class="form-control" placeholder="Enter Research And Analysis" name="researchanalysis" id="researchanalysis">
                    </div>
                      <div class="col-sm-6">
                        <label class="label-control label">Totalpages</label>
                        <input type="text" class="form-control" placeholder="Enter Totalpages" name="totalpages" id="totalpages">
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Publisher <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Publisher" name="publisher" id="publisher">
                        <div class="text-danger" id="publisher-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Publication date</label>
                        <input type="date" class="form-control" placeholder="Enter Publication date" name="publicationdate" id="publicationdate">
                    </div>
                     {{-- <div class="col-sm-6">
                        <label class="label-control label">Title-hindi <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Hindi" name="title_hindi" id="title_hindi">
                        <div class="text-danger" id="title-hindi-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Title-Arabic</label>
                        <input type="text" class="form-control" placeholder="Enter Title Arabic" name="title_arabic" id="title_arabic">
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Title-Urdu</label>
                        <input type="text" class="form-control" placeholder="Enter Title Urdu" name="title_urdu" id="title_urdu">
                    </div> --}}
                     <div class="col-sm-6">
                        <label class="label-control label">URL <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Url" name="url" id="url">
                        <div class="text-danger" id="url-err"></div>
                     </div>
                     
                      <div class="col-md-6">
                      <label class="label-control label">Book Cover <span class="required">*</span></label>
                      <input type="file" class="form-control" name="book_cover" id="book_cover">
                      <div class="text-danger" id="book_cover-err"></div>
                      </div>
                       <div class="col-md-6">
                      <label class="label-control label">Book Banner <span class="required">*</span></label>
                      <input type="file" class="form-control" name="book_image" id="image">
                      <div class="text-danger" id="book_image-err"></div>
                      </div>

                      <div class="col-sm-6">
                      <label class="label-control label">Pdf File </span></label>
                      <input type="file" class="form-control" name="book_file" id="book_file">

                   </div>
                   <div class="col-sm-6">
                    <label class="label-control label">Pdf URL</label>
                    <input type="text" class="form-control" placeholder="Enter Url" name="pdf_url" id="pdf_url">
                     </div>

                      
                    <div class="col-sm-6">
                        <label class="label-control label">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                    </div>
                </div>



               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add-book-btn">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
</div>
