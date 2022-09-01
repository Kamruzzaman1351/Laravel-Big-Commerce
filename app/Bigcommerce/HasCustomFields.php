<?php

namespace App\Bigcommerce;

use Illuminate\Http\Client\PendingRequest;

trait HasCustomFields
{
    public abstract function client(): PendingRequest;

    public abstract function generateUrl($end_point, $id = null): string;

    private function generateCustomFieldsUrl($id, $customFieldId = null): string
    {
        return static::generateUrl($this->endPoint, $id) . '/custom-fields' . ($customFieldId ? ('/' . $customFieldId) : '');
    }

    public function getCustomFields($id, $query_data = null)
    {
        $response = $this->client()->get($this->generateCustomFieldsUrl($id), $query_data);
        if ($response->status() == 200)
            return json_decode($response->body(), true);

        return false;
    }

    public function createCustomField($id, $form_data = [])
    {
        $response = $this->client()->post($this->generateCustomFieldsUrl($id), $form_data);
        if ($response->status() == 200)
            return json_decode($response->body(), true);

        return false;
    }

    public function updateCustomField($id, $customFieldId, $form_data = [])
    {
        $response = $this->client()->put($this->generateCustomFieldsUrl($id, $customFieldId), $form_data);
        if ($response->status() == 200)
            return json_decode($response->body(), true);

        return false;
    }

    public function deleteCustomField($id, $customFieldId)
    {
        $response = $this->client()->delete($this->generateCustomFieldsUrl($id, $customFieldId));
        if ($response->status() == 200)
            return json_decode($response->body(), true);

        return false;
    }
}
