<?php if (!defined('BASEPATH')) exit('No direct access allowed.');
/**
 * LifePress - Lifestream software built on the CodeIgniter PHP framework.
 * Copyright (c) 2012, Mitchell McKenna <mitchellmckenna@gmail.com>
 *
 * LifePress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * LifePress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with LifePress.  If not, see <http://www.gnu.org/licenses/>.
 *
 * This file incorporates work covered by the following copyright and
 * permission notice:
 *
 *     Sweetcron - Self-hosted lifestream software based on the CodeIgniter framework.
 *     Copyright (c) 2008, Yongfook.com & Edible, Inc. All rights reserved.
 *
 *     Sweetcron is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     Sweetcron is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *     GNU General Public License for more details.
 *     You should have received a copy of the GNU General Public License 
 *     along with Sweetcron.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     LifePress
 * @author      Mitchell McKenna <mitchellmckenna@gmail.com>
 * @copyright   Copyright (c) 2012, Mitchell McKenna
 * @license     http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

class Items extends MY_Auth_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->lifepress->get_items_page('index', $this->uri->segment(4,1), FALSE);
    }

    function search($query = NULL)
    {
        if ($query) {
            $this->lifepress->get_items_page('search', $this->uri->segment(6,1), FALSE, $query);
        } else {
            header('Location: '.$this->config->item('base_url').'admin/items');
        }
    }

    function tag($tag = NULL)
    {
        if ($tag) {
            $this->lifepress->get_items_page('tag', $this->uri->segment(6,1), FALSE, $tag);
        } else {
            header('Location: '.$this->config->item('base_url').'admin/items');
        }
    }

    function site($feed_domain = NULL)
    {
        if ($feed_domain) {
            $this->lifepress->get_items_page('site', $this->uri->segment(6,1), FALSE, $feed_domain);
        } else {
            header('Location: '.$this->config->item('base_url').'admin/items');
        }
    }

    function fetch()
    {
        $this->lifepress->fetch_items();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }

    function delete($item_id)
    {
        $this->item_model->delete_item($item_id);
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}

/* End of file items.php */
/* Location: ./application/controllers/admin/items.php */
