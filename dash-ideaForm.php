<?php if(!isset($_SESSION['logged_in']))
{header('Location: '.'index.php');}?>
<link href="stylesheets/dash-ideaForm-style.css" rel="stylesheet" type="text/css" />

   <div id="container">

    	<div id="idea_head">Idea 1: Submission form</div>
        <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
        <center>
            <form>
                <table>
                    <tr>
                        <td class="label">Idea title :</td>
                        <td><input name="idea_title" type="text"></td>
                    </tr>
                    <tr>
                        <td class="label">Related themes :</td>
                        <td>
                            <input name="healthcare" id="healthcare" class="chkBox" type="checkbox" value="Healthcare"><label class="chkBoxLabel">Healthcare</label>
                            <input name="society" id="society"  class="chkBox" type="checkbox" value="Society"><label class="chkBoxLabel">Society</label>
                            <input name="finance" id="finance" class="chkBox" type="checkbox" value="Finance"><label class="chkBoxLabel">Finance</label><br>
                            <input name="lifestyle" id="lifestyle" class="chkBox" type="checkbox" value="Lifestyle"><label class="chkBoxLabel">Lifestyle</label>
                            <input name="education" id="education" class="chkBox" type="checkbox" value="Education"><label class="chkBoxLabel">Eduction</label>
                            <input name="others" id="others" class="chkBox" type="checkbox" value="Others" onchange="enableOthers()"><label class="chkBoxLabel">Others</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Others :</td>
                        <td><input name="otheroption" type="text" id="otherTheme" disabled="true"></td>
                    </tr>
                    <tr>
                        <td class="label">Members (incl. you) :</td>
                        <td><select name="member_num" class="member" onchange="otherField(this);">
                          <option selected></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
                    </tr>
                    <tr id="others_1">
                    </tr>
                    <tr id="others_2">
                        
                    </tr>
                    <tr>
                        <td class="label">Idea summary :</td>
                        <td>
                        	<textarea name="ideasum" cols="700" class="ideaSum" placeholder="Max 700 characters" onKeyPress="return charLimit(this)" onKeyUp="return characterCount(this)"></textarea>
                            <br><span id="charac"><span id="char_num">700</span> characters remaining</span>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="button" name="save_idea" value="Save changes"></td>
                        <td><input type="submit" class="button" name="submit_idea" value="Submit Idea"></td>
                    </tr>
                </table>
            </form>
        </center>
    
	</div>